@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit User</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

        <form action="{{ route('AdminUserUpdate', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Full Name -->
            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium">Full Name</label>
                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    class="input input-bordered w-full"
                    value="{{ old('full_name', $user->full_name) }}"
                    required
                >
                @error('full_name')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="input input-bordered w-full"
                    value="{{ old('email', $user->email) }}"
                    required
                >
                @error('email')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium">Phone</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    class="input input-bordered w-full"
                    value="{{ old('phone', $user->phone) }}"
                >
                @error('phone')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium">Address</label>
                <input
                    type="text"
                    id="address"
                    name="address"
                    class="input input-bordered w-full"
                    value="{{ old('address', $user->address) }}"
                >
                @error('address')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Billing Address -->
            <div class="mb-4">
                <label for="billing_address" class="block text-sm font-medium">Billing Address</label>
                <input
                    type="text"
                    id="billing_address"
                    name="billing_address"
                    class="input input-bordered w-full"
                    value="{{ old('billing_address', $user->billing_address) }}"
                >
                @error('billing_address')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Shipping Address -->
            <div class="mb-4">
                <label for="shipping_address" class="block text-sm font-medium">Shipping Address</label>
                <input
                    type="text"
                    id="shipping_address"
                    name="shipping_address"
                    class="input input-bordered w-full"
                    value="{{ old('shipping_address', $user->shipping_address) }}"
                >
                @error('shipping_address')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
