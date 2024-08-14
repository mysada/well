<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search  = $request->input('search');
        $role    = $request->input('role');
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

        $query->orderByDesc('id');
        $users = $query->paginate($perPage);
        $title = "User Management - List";

        // Fetch addresses for users
        foreach ($users as $user) {
            $latestOrder            = $user->orders()->latest()->first();
            $user->shipping_address = $latestOrder
              ? $latestOrder->shipping_address : 'Not provided';

            $latestPayment         = $latestOrder ? $latestOrder->payment
              : null;
            $user->billing_address = $latestPayment
              ? $latestPayment->billing_address : 'Not provided';
            $user->billing_phone   = $latestPayment
              ? $latestPayment->billing_phone : 'Not provided';
        }

        return view('admin.pages.user.index', [
          'items'    => $users,
          'search'   => $search,
          'role'     => $role,
          'per_page' => $perPage,
          'title'    => $title,
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
//    public function store(Request $request)
//    {
//        // Validate the incoming request data
//        $validatedData = $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|unique:users,email',
//            'password' => 'required|string|min:8',
//            'role' => 'required|string|max:255',
//            'phone' => 'nullable|string|max:15',
//        ]);
//
//        // Determine if the user is an admin
//        $isAdmin = $validatedData['role'] === 'admin' ? 1 : 0;
//
//        // Hash the password before storing
//        $validatedData['password'] = Hash::make($validatedData['password']);
//        $validatedData['full_name'] = $validatedData['name'];
//        $validatedData['is_admin'] = $isAdmin;
//
//        // Create a new user
//        User::create($validatedData);
//
//        // Redirect to the user list page with a success message
//        return redirect()->route('AdminUserList')->with('success', 'User created successfully!');
//    }

// STORE method now added by aman to prevents sql injection, xss threats
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/', // Allow only letters and spaces
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255|in:admin,user', // Allow only 'admin' or 'user'
            'phone' => 'nullable|string|max:15|regex:/^[\d\-\+\(\)\s]+$/', // Allow only digits, dashes, and spaces
        ]);

        // Determine if the user is an admin
        $isAdmin = $validatedData['role'] === 'admin' ? 1 : 0;

        // Hash the password before storing
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['full_name'] = $validatedData['name'];
        $validatedData['is_admin'] = $isAdmin;

        // Create a new user
        User::create($validatedData);

        // Redirect to the user list page with a success message
        return redirect()->route('AdminUserList')->with('success', 'User created successfully!');
    }
// STORE method ends here


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Fetch the default address information
        $defaultAddress = $user->defaultAddress;

        // Extract the relevant address fields
        $billingName       = $defaultAddress ? $defaultAddress->billing_name
          : 'Not provided';
        $billingAddress    = $defaultAddress ? $defaultAddress->billing_address
          : 'Not provided';
        $billingCity       = $defaultAddress ? $defaultAddress->billing_city
          : 'Not provided';
        $billingProvince   = $defaultAddress ? $defaultAddress->billing_province
          : 'Not provided';
        $billingCountry    = $defaultAddress ? $defaultAddress->billing_country
          : 'Not provided';
        $billingPostalCode = $defaultAddress
          ? $defaultAddress->billing_postal_code : 'Not provided';
        $billingEmail      = $defaultAddress ? $defaultAddress->billing_email
          : 'Not provided';
        $billingPhone      = $defaultAddress ? $defaultAddress->billing_phone
          : 'Not provided';

        $shippingName       = $defaultAddress ? $defaultAddress->shipping_name
          : 'Not provided';
        $shippingAddress    = $defaultAddress
          ? $defaultAddress->shipping_address : 'Not provided';
        $shippingCity       = $defaultAddress ? $defaultAddress->shipping_city
          : 'Not provided';
        $shippingProvince   = $defaultAddress
          ? $defaultAddress->shipping_province : 'Not provided';
        $shippingCountry    = $defaultAddress
          ? $defaultAddress->shipping_country : 'Not provided';
        $shippingPostalCode = $defaultAddress
          ? $defaultAddress->shipping_postal_code : 'Not provided';
        $shippingEmail      = $defaultAddress ? $defaultAddress->shipping_email
          : 'Not provided';
        $shippingPhone      = $defaultAddress ? $defaultAddress->shipping_phone
          : 'Not provided';

        $title = "User Details - $user->name ";

        return view(
          'admin.pages.user.show',
          compact(
            'title',
            'user',
            'billingName',
            'billingAddress',
            'billingCity',
            'billingProvince',
            'billingCountry',
            'billingPostalCode',
            'billingEmail',
            'billingPhone',
            'shippingName',
            'shippingAddress',
            'shippingCity',
            'shippingProvince',
            'shippingCountry',
            'shippingPostalCode',
            'shippingEmail',
            'shippingPhone'
          )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Find the default address for the user
        $defaultAddress = DefaultAddress::where('user_id', $id)->first();

        // Default address data
        $shippingAddress    = $defaultAddress
          ? $defaultAddress->shipping_address : 'Not provided';
        $shippingCity       = $defaultAddress ? $defaultAddress->shipping_city
          : 'Not provided';
        $shippingProvince   = $defaultAddress
          ? $defaultAddress->shipping_province : 'Not provided';
        $shippingCountry    = $defaultAddress
          ? $defaultAddress->shipping_country : 'Not provided';
        $shippingPostalCode = $defaultAddress
          ? $defaultAddress->shipping_postal_code : 'Not provided';
        $shippingEmail      = $defaultAddress ? $defaultAddress->shipping_email
          : 'Not provided';
        $shippingPhone      = $defaultAddress ? $defaultAddress->shipping_phone
          : 'Not provided';

        $billingAddress    = $defaultAddress ? $defaultAddress->billing_address
          : 'Not provided';
        $billingCity       = $defaultAddress ? $defaultAddress->billing_city
          : 'Not provided';
        $billingProvince   = $defaultAddress ? $defaultAddress->billing_province
          : 'Not provided';
        $billingCountry    = $defaultAddress ? $defaultAddress->billing_country
          : 'Not provided';
        $billingPostalCode = $defaultAddress
          ? $defaultAddress->billing_postal_code : 'Not provided';
        $billingEmail      = $defaultAddress ? $defaultAddress->billing_email
          : 'Not provided';
        $billingPhone      = $defaultAddress ? $defaultAddress->billing_phone
          : 'Not provided';

        $title = "User Management - Edit";

        return view(
          'admin.pages.user.edit',
          compact(
            'title',
            'user',
            'title',
            'shippingAddress',
            'shippingCity',
            'shippingProvince',
            'shippingCountry',
            'shippingPostalCode',
            'shippingEmail',
            'shippingPhone',
            'billingAddress',
            'billingCity',
            'billingProvince',
            'billingCountry',
            'billingPostalCode',
            'billingEmail',
            'billingPhone'
          )
        );
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request, $id)
//    {
//        // Validate the incoming request data
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
//            'phone' => 'nullable|string|max:15',
//            'shipping_address' => 'nullable|string',
//            'shipping_city' => 'nullable|string',
//            'shipping_province' => 'nullable|string',
//            'shipping_country' => 'nullable|string',
//            'shipping_postal_code' => 'nullable|string',
//            'shipping_email' => 'nullable|string|email',
//            'shipping_phone' => 'nullable|string',
//            'billing_address' => 'nullable|string',
//            'billing_city' => 'nullable|string',
//            'billing_province' => 'nullable|string',
//            'billing_country' => 'nullable|string',
//            'billing_postal_code' => 'nullable|string',
//            'billing_email' => 'nullable|string|email',
//            'billing_phone' => 'nullable|string',
//        ]);
//
//        // Fetch the user by ID
//        $user = User::findOrFail($id);
//
//        // Update the user's basic information
//        $user->update([
//            'name' => $request->input('name'),
//            'full_name' => $request->input('name'),
//            'email' => $request->input('email'),
//            'phone' => $request->input('phone'),
//        ]);
//
//        // Update the default addresses
//        $defaultAddress = DefaultAddress::where('user_id', $id)->first();
//
//        if ($defaultAddress) {
//            $defaultAddress->update([
//                'shipping_name' => $request->input('shipping_name'),
//                'shipping_address' => $request->input('shipping_address'),
//                'shipping_city' => $request->input('shipping_city'),
//                'shipping_province' => $request->input('shipping_province'),
//                'shipping_country' => $request->input('shipping_country'),
//                'shipping_postal_code' => $request->input('shipping_postal_code'),
//                'shipping_email' => $request->input('shipping_email'),
//                'shipping_phone' => $request->input('shipping_phone'),
//                'billing_name' => $request->input('billing_name'),
//                'billing_address' => $request->input('billing_address'),
//                'billing_city' => $request->input('billing_city'),
//                'billing_province' => $request->input('billing_province'),
//                'billing_country' => $request->input('billing_country'),
//                'billing_postal_code' => $request->input('billing_postal_code'),
//                'billing_email' => $request->input('billing_email'),
//                'billing_phone' => $request->input('billing_phone'),
//            ]);
//        } else {
//            // If no default address exists for the user, create a new one
//            DefaultAddress::create([
//                'user_id' => $id,
//                'shipping_name' => $request->input('shipping_name'),
//                'shipping_address' => $request->input('shipping_address'),
//                'shipping_city' => $request->input('shipping_city'),
//                'shipping_province' => $request->input('shipping_province'),
//                'shipping_country' => $request->input('shipping_country'),
//                'shipping_postal_code' => $request->input('shipping_postal_code'),
//                'shipping_email' => $request->input('shipping_email'),
//                'shipping_phone' => $request->input('shipping_phone'),
//                'billing_name' => $request->input('billing_name'),
//                'billing_address' => $request->input('billing_address'),
//                'billing_city' => $request->input('billing_city'),
//                'billing_province' => $request->input('billing_province'),
//                'billing_country' => $request->input('billing_country'),
//                'billing_postal_code' => $request->input('billing_postal_code'),
//                'billing_email' => $request->input('billing_email'),
//                'billing_phone' => $request->input('billing_phone'),
//            ]);
//        }
//
//        // Redirect back to the user list page with a success message
//        return redirect()->route('AdminUserList')->with('success', 'User updated successfully.');
//    }

//UPDATE method added by aman to protect sql injection and xss
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u', // Only allows letters, spaces, and hyphens
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15|regex:/^\+?[0-9\-]*$/', // Allows only numbers, +, and -
            'shipping_address' => 'nullable|string|max:255|regex:/^[\pL\s0-9\-.,]+$/u',
            'shipping_city' => 'nullable|string|max:255|regex:/^[\pL\s\-]+$/u',
            'shipping_province' => 'nullable|string|max:255|regex:/^[\pL\s\-]+$/u',
            'shipping_country' => 'nullable|string|max:255|regex:/^[\pL\s\-]+$/u',
            'shipping_postal_code' => 'nullable|string|max:20|regex:/^[A-Za-z0-9\- ]+$/',
            'shipping_email' => 'nullable|string|email|max:255',
            'shipping_phone' => 'nullable|string|max:15|regex:/^\+?[0-9\-]*$/',
            'billing_address' => 'nullable|string|max:255|regex:/^[\pL\s0-9\-.,]+$/u',
            'billing_city' => 'nullable|string|max:255|regex:/^[\pL\s\-]+$/u',
            'billing_province' => 'nullable|string|max:255|regex:/^[\pL\s\-]+$/u',
            'billing_country' => 'nullable|string|max:255|regex:/^[\pL\s\-]+$/u',
            'billing_postal_code' => 'nullable|string|max:20|regex:/^[A-Za-z0-9\- ]+$/',
            'billing_email' => 'nullable|string|email|max:255',
            'billing_phone' => 'nullable|string|max:15|regex:/^\+?[0-9\-]*$/',
        ]);

        // Fetch the user by ID
        $user = User::findOrFail($id);

        // Update the user's basic information
        $user->update([
            'name' => $validatedData['name'],
            'full_name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
        ]);

        // Update the default addresses
        $defaultAddress = DefaultAddress::where('user_id', $id)->first();

        if ($defaultAddress) {
            $defaultAddress->update([
                'shipping_name' => $validatedData['name'],
                'shipping_address' => $validatedData['shipping_address'],
                'shipping_city' => $validatedData['shipping_city'],
                'shipping_province' => $validatedData['shipping_province'],
                'shipping_country' => $validatedData['shipping_country'],
                'shipping_postal_code' => $validatedData['shipping_postal_code'],
                'shipping_email' => $validatedData['shipping_email'],
                'shipping_phone' => $validatedData['shipping_phone'],
                'billing_name' => $validatedData['name'],
                'billing_address' => $validatedData['billing_address'],
                'billing_city' => $validatedData['billing_city'],
                'billing_province' => $validatedData['billing_province'],
                'billing_country' => $validatedData['billing_country'],
                'billing_postal_code' => $validatedData['billing_postal_code'],
                'billing_email' => $validatedData['billing_email'],
                'billing_phone' => $validatedData['billing_phone'],
            ]);
        } else {
            // If no default address exists for the user, create a new one
            DefaultAddress::create([
                'user_id' => $id,
                'shipping_name' => $validatedData['name'],
                'shipping_address' => $validatedData['shipping_address'],
                'shipping_city' => $validatedData['shipping_city'],
                'shipping_province' => $validatedData['shipping_province'],
                'shipping_country' => $validatedData['shipping_country'],
                'shipping_postal_code' => $validatedData['shipping_postal_code'],
                'shipping_email' => $validatedData['shipping_email'],
                'shipping_phone' => $validatedData['shipping_phone'],
                'billing_name' => $validatedData['name'],
                'billing_address' => $validatedData['billing_address'],
                'billing_city' => $validatedData['billing_city'],
                'billing_province' => $validatedData['billing_province'],
                'billing_country' => $validatedData['billing_country'],
                'billing_postal_code' => $validatedData['billing_postal_code'],
                'billing_email' => $validatedData['billing_email'],
                'billing_phone' => $validatedData['billing_phone'],
            ]);
        }

        // Redirect back to the user list page with a success message
        return redirect()->route('AdminUserList')->with('success', 'User updated successfully.');
    }

//
  
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Soft delete the user
        $user->delete();

        // Redirect back to the user list page with a success message
        return redirect()->route('AdminUserList')->with(
          'success',
          'User deleted successfully!'
        );
    }

}
