@extends('admin.admin')

@section('title', $title)

@section('content')
    <div class="container mx-auto">
            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('AdminUserList') }}" class="mb-4">
                <div class="flex gap-4 justify-end">
                    <label class="input input-bordered flex items-center gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Search by name or email">
                    </label>
                    <select name="role" class="select select-bordered">
                        <option value="">All Roles</option>
                        <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    <select name="per_page" class="select select-bordered">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                    <div class="flex join">
                        <button type="submit" class="btn btn-neutral join-item">Apply</button>
                        <a href="{{ route('AdminUserCreate') }}" class="btn btn-primary join-item">Add User</a>
                    </div>
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
                                    <a href="{{ route('AdminUserShow', $user->id) }}"
                                       class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('AdminUserDestroy', $user->id) }}" method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

@endsection
