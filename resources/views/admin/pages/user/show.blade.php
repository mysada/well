@extends('admin.admin')

@section('title', "User Details - {$user->name}")

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold">User Details</h1>

        <div class="card mt-6 p-6 bg-white shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-lg font-medium">Basic Information</h2>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Role:</strong> {{ $user->is_admin ? 'Admin' : 'User' }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-medium">Addresses</h2>
                    <p><strong>Shipping Address:</strong> {{ $shippingAddress }}</p>
                    <p><strong>Billing Address:</strong> {{ $billingAddress }}</p>
                    <p><strong>Billing Phone:</strong> {{ $billingPhone }}</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-warning">Edit User</a>
                <a href="{{ route('AdminUserList') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
