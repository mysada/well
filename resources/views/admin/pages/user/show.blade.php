@extends('admin.admin')

@section('content')
    <div class="container mx-auto">

        <!-- Back Button -->
        <div class="flex justify-start mb-4">
            <a href="{{ route('AdminUserList') }}" class="btn btn-primary">
                Back to List
            </a>
        </div>

        <!-- User Details -->
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
                <p class="text-gray-700">{{ $user->phone ?? 'User has not updated phone number' }}</p>
            </div>
            <div>
                <p class="font-semibold text-lg">Address:</p>
                <p class="text-gray-700">{{ $user->address ?? 'User has not updated address' }}</p>
            </div>
            <div>
                <p class="font-semibold text-lg">Billing Address:</p>
                <p class="text-gray-700">{{ $user->billing_address ?? 'User has not updated billing address' }}</p>
            </div>
            <div>
                <p class="font-semibold text-lg">Shipping Address:</p>
                <p class="text-gray-700">{{ $user->shipping_address ?? 'User has not updated shipping address' }}</p>
            </div>
            <div>
                <p class="font-semibold text-lg">Created At:</p>
                <p class="text-gray-700">{{ $user->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-6 flex">
            <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-primary mr-4">Edit</a>
            <form action="{{ route('AdminUserDestroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
