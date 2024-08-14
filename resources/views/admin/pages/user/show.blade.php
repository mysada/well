@extends('admin.admin')

@section('title', "User Details - {$user->name}")

@section('content')
    <div class="container flex flex-col gap-4">
        <div class="flex justify-end items-center">
            <div class="join">
                <a href="{{ route('AdminUserList') }}" class="btn btn-neutral join-item">Back to List</a>
                <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn join-item btn-primary">Edit User</a>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-primary text-4xl">Basic Information</h2>
                <ul class="space-y-2">
                    <li><span class="font-medium">Name:</span> {{ $user->name }}</li>
                    <li><span class="font-medium">Email:</span> {{ $user->email }}</li>
                    <li><span class="font-medium">Role:</span> {{ $user->is_admin ? 'Admin' : 'User' }}</li>
                    <li><span class="font-medium">Phone:</span> {{ $user->phone }}</li>
                </ul>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-primary text-4xl">Default Address</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-medium mb-3">Shipping Details</h3>
                        <ul class="space-y-2">
                            <li><span class="font-medium">Address:</span> {{ $shippingAddress ?? 'Not provided' }}</li>
                            <li><span class="font-medium">City:</span> {{ $shippingCity ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Province:</span> {{ $shippingProvince ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Country:</span> {{ $shippingCountry ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Postal Code:</span> {{ $shippingPostalCode ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Email:</span> {{ $shippingEmail ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Phone:</span> {{ $shippingPhone ?? 'Not provided' }}</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium mb-3">Billing Details</h3>
                        <ul class="space-y-2">
                            <li><span class="font-medium">Address:</span> {{ $billingAddress ?? 'Not provided' }}</li>
                            <li><span class="font-medium">City:</span> {{ $billingCity ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Province:</span> {{ $billingProvince ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Country:</span> {{ $billingCountry ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Postal Code:</span> {{ $billingPostalCode ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Email:</span> {{ $billingEmail ?? 'Not provided' }}</li>
                            <li><span class="font-medium">Phone:</span> {{ $billingPhone ?? 'Not provided' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
