@extends('admin.admin')

@section('content')
    <div class="container">
        <!-- Search and Filters -->
        <form method="GET" action="{{ route('AdminUserList') }}">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- User Table -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Admin' : 'Customer' }}</td>
                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <!-- Check if user is admin -->
                        @if ($user->id !== auth()->id()) <!-- Prevent admin from editing/deleting themselves -->
                        <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('AdminUserDestroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @else
                            <span class="text-muted">You (cannot modify)</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $users->links() }}
    </div>
@endsection
