@extends('admin.admin')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <div class="relative">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md sticky top-0 z-10">
                <h1 class="text-2xl font-bold mb-6 text-center">Edit User</h1>

                <form method="POST" action="{{ route('AdminUserUpdate', $user->id) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="block text-sm font-medium mb-1">Name</label>
                        <input type="text" name="name" id="name" class="input input-bordered w-full" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="full_name" class="block text-sm font-medium mb-1">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="input input-bordered w-full" value="{{ old('full_name', $user->full_name) }}">
                        @error('full_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" id="email" class="input input-bordered w-full" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="block text-sm font-medium mb-1">Phone</label>
                        <input type="text" name="phone" id="phone" class="input input-bordered w-full" value="{{ old('phone', $user->phone) }}">
                    </div>

                    <div class="form-group">
                        <label for="address" class="block text-sm font-medium mb-1">Address</label>
                        <input type="text" name="address" id="address" class="input input-bordered w-full" value="{{ old('address', $user->address) }}">
                    </div>

                    <div class="form-group">
                        <label for="billing_address" class="block text-sm font-medium mb-1">Billing Address</label>
                        <input type="text" name="billing_address" id="billing_address" class="input input-bordered w-full" value="{{ old('billing_address', $user->billing_address) }}">
                    </div>

                    <div class="form-group">
                        <label for="shipping_address" class="block text-sm font-medium mb-1">Shipping Address</label>
                        <input type="text" name="shipping_address" id="shipping_address" class="input input-bordered w-full" value="{{ old('shipping_address', $user->shipping_address) }}">
                    </div>

                    <div class="form-group">
                        <label for="is_admin" class="block text-sm font-medium mb-1">Role</label>
                        <select name="is_admin" id="is_admin" class="input input-bordered w-full" disabled>
                            <option value="0" {{ old('is_admin', $user->is_admin) == 0 ? 'selected' : '' }}>Customer</option>
                            <option value="1" {{ old('is_admin', $user->is_admin) == 1 ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-full">Update User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
