<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $role = $request->input('role');
        $sort = $request->input('sort');
        $perPage = $request->input('per_page', 10);

        $query = User::query();

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($role) {
            $query->where('is_admin', $role === 'admin');
        }

        if ($sort) {
            $query->orderBy('name', $sort);
        }

        $users = $query->paginate($perPage);
        $title = "User Management - List";

        // Fetch addresses for users
        foreach ($users as $user) {
            // Get the latest order for the user
            $latestOrder = $user->orders()->latest()->first();
            $user->shipping_address = $latestOrder ? $latestOrder->shipping_address : null;

            // Get the payment related to the latest order
            $latestPayment = $latestOrder ? $latestOrder->payments()->latest()->first() : null;
            $user->billing_address = $latestPayment ? $latestPayment->billing_address : null;
        }

        return view('admin.pages.user.index', [
            'items' => $users,
            'search' => $search,
            'role' => $role,
            'sort' => $sort,
            'per_page' => $perPage,
            'title' => $title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "User Management - Create";
        return view('admin.pages.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8', // Ensure password is valid
            'full_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'billing_address' => 'nullable|string|max:255',
            'shipping_address' => 'nullable|string|max:255',
            'is_admin' => 'nullable|boolean',
        ]);

        // Hash the password before storing
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create a new user
        User::create($validatedData);

        // Redirect to the user list page with a success message
        return redirect()->route('AdminUserList')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Fetch the latest shipping address from the Order model
        $latestOrder = $user->orders()->latest()->first();
        $shippingAddress = $latestOrder ? $latestOrder->shipping_address : 'Not provided';

        // Fetch the latest billing address and billing phone from the Payment model
        $latestPayment = $user->payments()->latest()->first();
        $billingAddress = $latestPayment ? $latestPayment->billing_address : 'Not provided';
        $billingPhone = $latestPayment ? $latestPayment->billing_phone : 'Not provided'; // Updated to fetch billing_phone

        $title = "User Management - Details";

        // Pass the user data, addresses, billing phone, and title to the view
        return view('admin.pages.user.show', compact('user', 'title', 'shippingAddress', 'billingAddress', 'billingPhone'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $title = "User Management - Edit";
        return view('admin.pages.user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', // Optional password update
            'full_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'billing_address' => 'nullable|string|max:255',
            'shipping_address' => 'nullable|string|max:255',
            'is_admin' => 'nullable|boolean',
        ]);

        // Update the password if provided
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        } else {
            // Remove password from the update data if not provided
            unset($validatedData['password']);
        }

        // Update user data
        $user->update($validatedData);

        // Redirect back to the user list page with a success message
        return redirect()->route('AdminUserList')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        // Permanently delete the user
        $user->forceDelete();

        // Redirect back to the user list page with a success message
        return redirect()->route('AdminUserList')->with('success', 'User deleted successfully!');
    }
}
