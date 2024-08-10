@extends('admin.admin')

@section('content')
    <div class="container">
        <h1 class="my-4">User Management</h1>

        <!-- Button to Create New User -->
        <a href="{{ route('AdminUserCreate') }}" class="btn btn-primary mb-3">Create New User</a>

        <!-- User Table -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
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
                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <!-- Check if user ID is not 1 before showing buttons -->
                        @if ($user->id !== 1)
                            <!-- Edit Button -->
                            <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('AdminUserDestroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No users found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $users->links() }}
    </div>
@endsection
