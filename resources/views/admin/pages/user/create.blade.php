@extends('admin.admin')

@section('title', $title)

@section('content')
    <div class="container flex flex-col gap-8">
        <div class="flex justify-end">
            <a href="{{ route('AdminUserList') }}" class="btn btn-neutral">Back to List</a>
        </div>
        <form action="{{ route('AdminUserStore') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="input input-bordered w-full @error('name') input-error @enderror"/>
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="input input-bordered w-full @error('email') input-error @enderror"/>
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" id="password"
                           class="input input-bordered w-full @error('password') input-error @enderror"/>
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium">Role</label>
                    <select name="role" id="role"
                            class="select select-bordered w-full @error('role') select-error @enderror">
                        <option value="">Select Role</option>
                        <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
@endsection
