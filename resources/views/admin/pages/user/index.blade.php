@extends('admin.admin')

@section('title', $title)

@section('content')
<div class="container mx-auto flex flex-col gap-4">

    <div class="container mx-auto p-6">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-semibold">{{ $title }}</h1>
            <a href="{{ route('AdminUserCreate') }}" class="btn btn-primary">Add User</a>
        </div>

        <!-- Search and Filter Form -->
        <form method="GET" action="{{ route('AdminUserList') }}" class="mb-4">
            <div class="flex gap-4 mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email" class="input input-bordered w-full" />
                <select name="role" class="select select-bordered">
                    <option value="">All Roles</option>
                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                </select>
                <select name="sort" class="select select-bordered">
                    <option value="">Sort By</option>
                    <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Name Ascending</option>
                    <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Name Descending</option>
                </select>
                <select name="per_page" class="select select-bordered">
                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                </select>
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>

        <!-- User Table -->
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('AdminUserShow', $user->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('AdminUserDestroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
