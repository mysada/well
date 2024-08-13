@extends('admin.admin')

@section('content')
    <div class="container mx-auto max-w-4xl px-4 py-6">

        <!-- Back Button -->
        <div class="flex justify-start mb-6">
            <a href="{{ route('AdminUserList') }}" class="btn btn-primary">
                Back to List
            </a>
        </div>

        <!-- User Details Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-3xl font-bold mb-6 text-gray-900">User Details</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- First Row -->
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="font-semibold text-lg text-gray-800">Full Name:</p>
                        <p class="text-gray-700">{{ $user->name }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="font-semibold text-lg text-gray-800">Email:</p>
                        <p class="text-gray-700">{{ $user->email }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="font-semibold text-lg text-gray-800">Role:</p>
                        <p class="text-gray-700">{{ $user->is_admin ? 'Admin' : 'Customer' }}</p>
                    </div>

                    <!-- Second Row -->
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="font-semibold text-lg text-gray-800">Phone:</p>
                        <p class="text-gray-700">
                            {{ $user->phone ?? ($billingPhone ?? 'Not provided') }}
                        </p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="font-semibold text-lg text-gray-800">Billing Address:</p>
                        <p class="text-gray-700">{{ $billingAddress }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="font-semibold text-lg text-gray-800">Shipping Address:</p>
                        <p class="text-gray-700">{{ $shippingAddress }}</p>
                    </div>

                    <!-- Last Row -->
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm col-span-3">
                        <p class="font-semibold text-lg text-gray-800">Created At:</p>
                        <p class="text-gray-700">{{ $user->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
