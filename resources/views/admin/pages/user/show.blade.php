@extends('admin.admin')

@section('title', "User Details - {$user->name}")

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold">User Details</h1>

        <div class="card mt-6 p-6 bg-white shadow-md">
            <!-- Basic Information Section -->
            <div class="mb-6">
                <div class="bg-black text-white p-4 t-lg">
                <h2 class="text-lg font-medium">Basic Information</h2>
                </div>
                <div class="p-4 bg-white rounded-b-lg shadow-sm">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Role:</strong> {{ $user->is_admin ? 'Admin' : 'User' }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                </div>
            </div>

            <!-- Default Address Section -->
            <div>
                <div class="bg-black text-white p-4 t-lg">
                    <h2 class="text-lg font-medium">Default Address</h2>
                </div>
                <div class="p-4 bg-white rounded-b-lg shadow-sm">
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Shipping Details -->
                        <div class="flex-1">
                            <h3 class="text-lg font-medium mb-2">Shipping Details</h3>
                            <p><strong>Address:</strong> {{ $shippingAddress ?? 'Not provided' }}</p>
                            <p><strong>City:</strong> {{ $shippingCity ?? 'Not provided' }}</p>
                            <p><strong>Province:</strong> {{ $shippingProvince ?? 'Not provided' }}</p>
                            <p><strong>Country:</strong> {{ $shippingCountry ?? 'Not provided' }}</p>
                            <p><strong>Postal Code:</strong> {{ $shippingPostalCode ?? 'Not provided' }}</p>
                            <p><strong>Email:</strong> {{ $shippingEmail ?? 'Not provided' }}</p>
                            <p><strong>Phone:</strong> {{ $shippingPhone ?? 'Not provided' }}</p>
                        </div>

                        <!-- Billing Details -->
                        <div class="flex-1">
                            <h3 class="text-lg font-medium mb-2">Billing Details</h3>
                            <p><strong>Address:</strong> {{ $billingAddress ?? 'Not provided' }}</p>
                            <p><strong>City:</strong> {{ $billingCity ?? 'Not provided' }}</p>
                            <p><strong>Province:</strong> {{ $billingProvince ?? 'Not provided' }}</p>
                            <p><strong>Country:</strong> {{ $billingCountry ?? 'Not provided' }}</p>
                            <p><strong>Postal Code:</strong> {{ $billingPostalCode ?? 'Not provided' }}</p>
                            <p><strong>Email:</strong> {{ $billingEmail ?? 'Not provided' }}</p>
                            <p><strong>Phone:</strong> {{ $billingPhone ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-warning">Edit User</a>
                <a href="{{ route('AdminUserList') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
