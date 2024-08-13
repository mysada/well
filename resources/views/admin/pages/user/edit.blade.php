@extends('admin.admin')

@section('title', $title)

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-8">{{ $title }}</h1>

        <form action="{{ route('AdminUserUpdate', $user->id) }}" method="POST" class="mt-6">
            @csrf
            @method('PUT')

            <!-- Basic Information Section -->
            <div class="card p-6 mb-6 bg-white shadow-md border border-gray-200">
                <h2 class="bg-black text-white p-4 t-lg">Basic Information</h2>
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
                </div>
            </div>

            <!-- Default Address Section -->
            <div class="card p-6 bg-white shadow-md border border-gray-200">
                <h2 class="bg-black text-white p-4 t-lg">Default Address</h2>

                <!-- Shipping Details -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-4">Shipping Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="shipping_address" class="block text-sm font-medium">Address</label>
                            <input type="text" name="shipping_address" id="shipping_address" value="{{ old('shipping_address', $shippingAddress) }}" class="input input-bordered w-full @error('shipping_address') input-error @enderror" />
                            @error('shipping_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="shipping_city" class="block text-sm font-medium">City</label>
                            <input type="text" name="shipping_city" id="shipping_city" value="{{ old('shipping_city', $shippingCity) }}" class="input input-bordered w-full @error('shipping_city') input-error @enderror" />
                            @error('shipping_city')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="shipping_province" class="block text-sm font-medium">Province</label>
                            <input type="text" name="shipping_province" id="shipping_province" value="{{ old('shipping_province', $shippingProvince) }}" class="input input-bordered w-full @error('shipping_province') input-error @enderror" />
                            @error('shipping_province')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="shipping_country" class="block text-sm font-medium">Country</label>
                            <input type="text" name="shipping_country" id="shipping_country" value="{{ old('shipping_country', $shippingCountry) }}" class="input input-bordered w-full @error('shipping_country') input-error @enderror" />
                            @error('shipping_country')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="shipping_postal_code" class="block text-sm font-medium">Postal Code</label>
                            <input type="text" name="shipping_postal_code" id="shipping_postal_code" value="{{ old('shipping_postal_code', $shippingPostalCode) }}" class="input input-bordered w-full @error('shipping_postal_code') input-error @enderror" />
                            @error('shipping_postal_code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="shipping_email" class="block text-sm font-medium">Email</label>
                            <input type="email" name="shipping_email" id="shipping_email" value="{{ old('shipping_email', $shippingEmail) }}" class="input input-bordered w-full @error('shipping_email') input-error @enderror" />
                            @error('shipping_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="shipping_phone" class="block text-sm font-medium">Phone</label>
                            <input type="text" name="shipping_phone" id="shipping_phone" value="{{ old('shipping_phone', $shippingPhone) }}" class="input input-bordered w-full @error('shipping_phone') input-error @enderror" />
                            @error('shipping_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Billing Details -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Billing Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="billing_address" class="block text-sm font-medium">Address</label>
                            <input type="text" name="billing_address" id="billing_address" value="{{ old('billing_address', $billingAddress) }}" class="input input-bordered w-full @error('billing_address') input-error @enderror" />
                            @error('billing_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="billing_city" class="block text-sm font-medium">City</label>
                            <input type="text" name="billing_city" id="billing_city" value="{{ old('billing_city', $billingCity) }}" class="input input-bordered w-full @error('billing_city') input-error @enderror" />
                            @error('billing_city')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="billing_province" class="block text-sm font-medium">Province</label>
                            <input type="text" name="billing_province" id="billing_province" value="{{ old('billing_province', $billingProvince) }}" class="input input-bordered w-full @error('billing_province') input-error @enderror" />
                            @error('billing_province')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="billing_country" class="block text-sm font-medium">Country</label>
                            <input type="text" name="billing_country" id="billing_country" value="{{ old('billing_country', $billingCountry) }}" class="input input-bordered w-full @error('billing_country') input-error @enderror" />
                            @error('billing_country')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="billing_postal_code" class="block text-sm font-medium">Postal Code</label>
                            <input type="text" name="billing_postal_code" id="billing_postal_code" value="{{ old('billing_postal_code', $billingPostalCode) }}" class="input input-bordered w-full @error('billing_postal_code') input-error @enderror" />
                            @error('billing_postal_code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="billing_email" class="block text-sm font-medium">Email</label>
                            <input type="email" name="billing_email" id="billing_email" value="{{ old('billing_email', $billingEmail) }}" class="input input-bordered w-full @error('billing_email') input-error @enderror" />
                            @error('billing_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="billing_phone" class="block text-sm font-medium">Phone</label>
                            <input type="text" name="billing_phone" id="billing_phone" value="{{ old('billing_phone', $billingPhone) }}" class="input input-bordered w-full @error('billing_phone') input-error @enderror" />
                            @error('billing_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('AdminUserList') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
