@extends('admin.admin')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Create User</h1>

            <form method="POST" action="{{ route('AdminUserStore') }}" class="space-y-4">
                @csrf

                <div class="form-group">
                    <label for="name" class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" name="name" id="name" class="input input-bordered w-full" required>
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" id="email" class="input input-bordered w-full" required>
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" name="password" id="password" class="input input-bordered w-full" required>
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone" class="block text-sm font-medium mb-1">Phone</label>
                    <input type="text" name="phone" id="phone" class="input input-bordered w-full">
                </div>

                <div class="form-group">
                    <label for="address" class="block text-sm font-medium mb-1">Address</label>
                    <input type="text" name="address" id="address" class="input input-bordered w-full">
                </div>

                <div class="form-group">
                    <label for="billing_address" class="block text-sm font-medium mb-1">Billing Address</label>
                    <input type="text" name="billing_address" id="billing_address" class="input input-bordered w-full">
                </div>

                <div class="form-group">
                    <label for="shipping_address" class="block text-sm font-medium mb-1">Shipping Address</label>
                    <input type="text" name="shipping_address" id="shipping_address" class="input input-bordered w-full">
                </div>

                <div class="form-group">
                    <label for="is_admin" class="block text-sm font-medium mb-1">Role</label>
                    <select name="is_admin" id="is_admin" class="input input-bordered w-full">
                        <option value="0">Customer</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-half">Create User</button>
            </form>
        </div>
    </div>
@endsection
