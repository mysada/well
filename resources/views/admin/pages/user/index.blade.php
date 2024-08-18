@extends('admin.admin')
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
                    <button type="submit" class="btn  join-item">Apply</button>
                    <a href="{{ route('AdminUserList') }}" class="btn btn-neutral join-item">Reset</a>
                    <a href="{{ route('AdminUserCreate') }}" class="btn btn-primary join-item">Add User</a>
                </div>
            </div>
        </form>

        <!-- User Table -->
        <table class="table w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Created Time</th>
                    <th class="px-0">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $user)
                    <tr class="hover">
                        <td>{{ $user->id }}</td>
                        <td>
                            <a class="link link-primary" href="{{ route('AdminUserShow', $user->id) }}">
                                {{ $user->name }}
                            </a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if($user->is_admin)
                                <div class="badge badge-primary">Admin</div>
                            @else
                                <div class="badge">User</div>
                            @endif

                        </td>

                        <td>{{ $user->created_at}}</td>
                        <td class="px-0">
                            <div class="join flex w-full">
                                <a class="btn btn-primary join-item flex-1 w-full"
                                   href="{{ route('AdminUserEdit', $user->id) }}">Edit</a>
                                <form class="flex-1" action="{{ route('AdminUserDestroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn join-item flex-1 w-full"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
