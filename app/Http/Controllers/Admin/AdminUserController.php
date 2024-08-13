<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $latestOrder = $user->orders()->latest()->first();
            $user->shipping_address = $latestOrder ? $latestOrder->shipping_address : 'Not provided';

            $latestPayment = $latestOrder ? $latestOrder->payment : null;
            $user->billing_address = $latestPayment ? $latestPayment->billing_address : 'Not provided';
            $user->billing_phone = $latestPayment ? $latestPayment->billing_phone : 'Not provided';
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
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255', // Assuming 'role' is a string field
            'phone' => 'nullable|string|max:15', // Add phone field validation
        ]);

        // Hash the password before storing
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['full_name'] = $validatedData['name']; // Automatically set full_name to match name

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
        $user = User::findOrFail($id);

        // Fetch the latest billing phone and address from the Payment model
        $latestPayment = $user->payments()->latest()->first();
        $billingPhone = $latestPayment ? $latestPayment->billing_phone : 'Not provided';
        $billingAddress = $latestPayment ? $latestPayment->billing_address : 'Not provided';

        // Fetch the latest shipping address from the Order model
        $latestOrder = $user->orders()->latest()->first();
        $shippingAddress = $latestOrder ? $latestOrder->shipping_address : 'Not provided';

        return view('admin.pages.user.show', compact('user', 'billingPhone', 'billingAddress', 'shippingAddress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Fetch the latest shipping address from the Order model
        $latestOrder = $user->orders()->latest()->first();
        $shippingAddress = $latestOrder ? $latestOrder->shipping_address : 'Not provided';

        // Fetch the latest billing address and phone from the Payment model
        $latestPayment = $latestOrder ? $latestOrder->payment : null;
        $billingAddress = $latestPayment ? $latestPayment->billing_address : 'Not provided';
        $billingPhone = $latestPayment ? $latestPayment->billing_phone : 'Not provided';

        $title = "User Management - Edit";

        return view('admin.pages.user.edit', compact('user', 'title', 'shippingAddress', 'billingAddress', 'billingPhone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'shipping_address' => 'nullable|string',
            'billing_address' => 'nullable|string',
            'billing_phone' => 'nullable|string',
        ]);

        // Fetch the user by ID
        $user = User::findOrFail($id);

        // Update the user's basic information
        $user->update([
            'name' => $request->input('name'),
            'full_name' => $request->input('name'), // Ensure full_name is updated
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Update the shipping address if available
        $latestOrder = $user->orders()->latest()->first();
        if ($latestOrder) {
            $latestOrder->update([
                'shipping_address' => $request->input('shipping_address'),
            ]);
        }

        // Update the billing address and phone if available
        $latestPayment = $latestOrder ? $latestOrder->payment : null;
        if ($latestPayment) {
            $latestPayment->update([
                'billing_address' => $request->input('billing_address'),
                'billing_phone' => $request->input('billing_phone'),
            ]);
        }

        // Redirect back to the user list page with a success message
        return redirect()->route('AdminUserList')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Soft delete the user
        $user->delete();

        // Redirect back to the user list page with a success message
        return redirect()->route('AdminUserList')->with('success', 'User deleted successfully!');
    }
}
