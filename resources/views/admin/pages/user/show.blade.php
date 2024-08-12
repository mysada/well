@extends('admin.admin')

@section('content')
    <div class="container mx-auto">

        <!-- Back Button -->
        <div class="flex justify-start mb-4">
            <a href="{{ route('AdminUserList') }}" class="btn btn-primary">
                Back to List
            </a>
        </div>

        <!-- User Details Card -->
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold mb-4">User Details</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="font-semibold text-lg">Full Name:</p>
                        <p class="text-gray-700">{{ $user->full_name }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Email:</p>
                        <p class="text-gray-700">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Role:</p>
                        <p class="text-gray-700">{{ $user->is_admin ? 'Admin' : 'Customer' }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Phone:</p>
                        <p class="text-gray-700">{{ $user->phone ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Address:</p>
                        <p class="text-gray-700">{{ $user->address ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Billing Address:</p>
                        <p class="text-gray-700">{{ $user->billing_address ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Shipping Address:</p>
                        <p class="text-gray-700">{{ $user->shipping_address ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Created At:</p>
                        <p class="text-gray-700">{{ $user->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="card-actions mt-6 flex justify-start space-x-4">
                    <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('AdminUserDestroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
