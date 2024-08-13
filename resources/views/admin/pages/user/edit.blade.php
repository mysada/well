@extends('admin.admin')

@section('title', $title)

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold">{{ $title }}</h1>

        <form action="{{ route('AdminUserUpdate', $user->id) }}" method="POST" class="mt-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="input input-bordered w-full @error('name') input-error @enderror" />
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="input input-bordered w-full @error('email') input-error @enderror" />
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="input input-bordered w-full @error('phone') input-error @enderror" />
                    @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="shipping_address" class="block text-sm font-medium">Shipping Address</label>
                    <input type="text" name="shipping_address" id="shipping_address" value="{{ old('shipping_address', $shippingAddress) }}" class="input input-bordered w-full @error('shipping_address') input-error @enderror" />
                    @error('shipping_address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="billing_address" class="block text-sm font-medium">Billing Address</label>
                    <input type="text" name="billing_address" id="billing_address" value="{{ old('billing_address', $billingAddress) }}" class="input input-bordered w-full @error('billing_address') input-error @enderror" />
                    @error('billing_address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="billing_phone" class="block text-sm font-medium">Billing Phone</label>
                    <input type="text" name="billing_phone" id="billing_phone" value="{{ old('billing_phone', $billingPhone) }}" class="input input-bordered w-full @error('billing_phone') input-error @enderror" />
                    @error('billing_phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('AdminUserList') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
@endsection
