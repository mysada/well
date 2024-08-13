@extends('admin.admin')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <!-- Added a wrapper div to ensure proper height for sticky positioning -->
        <div class="relative">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md sticky top-0 z-10">
                <h1 class="text-2xl font-bold mb-6 text-center">Create User</h1>

                <form id="createUserForm" method="POST" action="{{ route('AdminUserStore') }}" class="space-y-4">
                    @csrf

                    <!-- Name Input -->
                    <div class="form-group">
                        <label for="name" class="block text-sm font-medium mb-1">Full Name</label>
                        <input type="text" name="name" id="name" class="input input-bordered w-full" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="email" class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" id="email" class="input input-bordered w-full" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="password" class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" name="password" id="password" class="input input-bordered w-full" required>
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone Input -->
                    <div class="form-group">
                        <label for="phone" class="block text-sm font-medium mb-1">Phone</label>
                        <input type="text" name="phone" id="phone" class="input input-bordered w-full" value="{{ old('phone') }}">
                    </div>

                    <!-- Billing Phone Input -->
                    <div class="form-group">
                        <label for="billing_phone" class="block text-sm font-medium mb-1">Billing Phone</label>
                        <input type="text" name="billing_phone" id="billing_phone" class="input input-bordered w-full" value="{{ old('billing_phone') }}">
                    </div>

                    <!-- Billing Address Input -->
                    <div class="form-group">
                        <label for="billing_address" class="block text-sm font-medium mb-1">Billing Address</label>
                        <input type="text" name="billing_address" id="billing_address" class="input input-bordered w-full" value="{{ old('billing_address') }}">
                    </div>

                    <!-- Shipping Address Input -->
                    <div class="form-group">
                        <label for="shipping_address" class="block text-sm font-medium mb-1">Shipping Address</label>
                        <input type="text" name="shipping_address" id="shipping_address" class="input input-bordered w-full" value="{{ old('shipping_address') }}">
                    </div>

                    <!-- Role Dropdown -->
                    <div class="form-group">
                        <label for="is_admin" class="block text-sm font-medium mb-1">Role</label>
                        <select name="is_admin" id="is_admin" class="input input-bordered w-full">
                            <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>Customer</option>
                            <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-half">Create User</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Admin Confirmation Modal -->
    <div id="adminConfirmationModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-2xl mb-4 text-center">Confirm Admin Role</h3>
            <p class="text-center mb-4">You are about to make this user an admin. This user will have the same privileges as you. Are you sure you want to proceed?</p>
            <div class="modal-action flex justify-center">
                <button id="confirmAdminButton" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('is_admin').addEventListener('change', function() {
            if (this.value == '1') {
                document.getElementById('adminConfirmationModal').classList.add('modal-open');
            }
        });

        document.getElementById('confirmAdminButton').addEventListener('click', function() {
            document.getElementById('adminConfirmationModal').classList.remove('modal-open');
        });
    </script>
@endsection
