@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <!-- Search and Filters -->
        <form method="GET" action="{{ route('AdminUserList') }}" class="mb-4">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full sm:w-3/4 px-2 mb-4 sm:mb-0">
                    <input type="text" name="search" class="input input-bordered w-full" placeholder="Search..." value="{{ request('search') }}">
                </div>
                <div class="w-full sm:w-1/4 px-2">
                    <button type="submit" class="btn btn-primary w-full">Search</button>
                </div>
            </div>
        </form>

        <!-- User Table -->
        <div class="overflow-hidden">
            <table class="table table-auto w-full">
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
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="whitespace-nowrap">
                            <span class="truncate block w-32" title="{{ $user->email }}">{{ $user->email }}</span>
                        </td>
                        <td>{{ $user->is_admin ? 'Admin' : 'Customer' }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <!-- Trigger Modal -->
                            <button class="btn btn-info btn-sm" onclick="openModal({{ $user->id }})">
                                View Details
                            </button>
                        </td>
                        <td class="text-center">
                            @if ($user->id !== auth()->id())
                                <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-warning btn-sm mb-1">
                                    Edit
                                </a>
                                <form action="{{ route('AdminUserDestroy', $user->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">You</span>
                            @endif
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

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>

        <!-- User Details Modal -->
        @foreach ($users as $user)
            <div id="modal-{{ $user->id }}" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">User Details</h3>
                    <p><strong>Full Name:</strong> {{ $user->full_name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Role:</strong> {{ $user->is_admin ? 'Admin' : 'Customer' }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                    <p><strong>Address:</strong> {{ $user->address }}</p>
                    <p><strong>Billing Address:</strong> {{ $user->billing_address }}</p>
                    <p><strong>Shipping Address:</strong> {{ $user->shipping_address }}</p>
                    <div class="modal-action">
                        <a href="#" class="btn" onclick="closeModal({{ $user->id }})">Close</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <script>
        function openModal(userId) {
            document.getElementById('modal-' + userId).classList.add('modal-open');
        }

        function closeModal(userId) {
            document.getElementById('modal-' + userId).classList.remove('modal-open');
        }
    </script>
@endsection
