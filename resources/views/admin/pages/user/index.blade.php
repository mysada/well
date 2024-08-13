@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <!-- Header with Filters and Actions -->
        <div class="flex justify-between mb-6">
            <!-- Search and Filters Form -->
            <form method="GET" action="{{ route('AdminUserList') }}" class="flex gap-2 items-center">
                <!-- Search Input -->
                <div class="flex-1">
                    <input
                        type="text"
                        name="search"
                        class="input input-bordered w-full"
                        placeholder="Search..."
                        value="{{ request('search') }}"
                    >
                </div>

                <!-- Role Filter -->
                <div class="flex-1">
                    <select name="role" class="select">
                        <option value="">All Roles</option>
                        <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="customer" {{ request('role') === 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>

                <!-- Name Sort Order Filter -->
                <div class="flex-1">
                    <select name="sort" class="select">
                        <option value="">Sort by Name</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>A to Z</option>
                        <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Z to A</option>
                    </select>
                </div>

                <!-- Items Per Page Selector -->
                <div class="flex-1">
                    <select name="per_page" class="select">
                        <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10 per page</option>
                        <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25 per page</option>
                        <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50 per page</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-secondary join-item">Apply Filters</button>
                <a href="{{ route('AdminUserCreate') }}" class="btn btn-primary">Create User</a>
            </form>
        </div>

        <!-- User Table -->
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($items as $user)
                    <tr class="hover">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="whitespace-nowrap">
                            <span class="truncate block w-32" title="{{ $user->email }}">{{ $user->email }}</span>
                        </td>
                        <td>{{ $user->is_admin ? 'Admin' : 'Customer' }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td class="text-center">
                            <a href="{{ route('AdminUserShow', $user->id) }}" class="btn btn-secondary btn-sm">View Details</a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-primary join-item">Edit</a>
                            <button type="button" onclick="confirmDeletion({{ $user->id }}, '{{ $user->name }}')" class="btn join-item">Delete</button>
                            <form id="delete-form-{{ $user->id }}" action="{{ route('AdminUserDestroy', $user->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No users found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        @include('admin.components.pagination')

        <!-- Delete Confirmation Modal -->
        <div id="delete-confirmation-modal" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-2xl mb-4 text-center">Confirm Deletion</h3>
                <p id="delete-confirmation-message" class="text-center mb-4">Are you sure you want to delete this user? This action cannot be undone.</p>
                <div class="modal-action flex justify-center">
                    <button id="confirm-delete-button" class="btn btn-primary">Delete</button>
                    <button class="btn btn-outline" onclick="closeDeleteModal()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let userIdToDelete = null;

        function confirmDeletion(userId, userName) {
            userIdToDelete = userId;
            document.getElementById('delete-confirmation-message').innerHTML = `Are you sure you want to delete <strong class="italic">${userName}</strong>? This action cannot be undone.`;
            document.getElementById('delete-confirmation-modal').classList.add('modal-open');
        }

        function closeDeleteModal() {
            document.getElementById('delete-confirmation-modal').classList.remove('modal-open');
        }

        document.getElementById('confirm-delete-button').addEventListener('click', function () {
            if (userIdToDelete !== null) {
                document.getElementById('delete-form-' + userIdToDelete).submit();
            }
            closeDeleteModal();
        });
    </script>
@endsection
