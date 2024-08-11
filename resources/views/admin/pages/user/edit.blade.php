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
