@extends('admin.admin')

@section('content')
    <div class="container mx-auto">

        <!-- Create User Button -->
        <div class="flex justify-start mb-4">
            <a href="{{ route('AdminUserCreate') }}" class="btn btn-primary">
                Create User
            </a>
        </div>

        <!-- Search and Filters -->
        <form method="GET" action="{{ route('AdminUserList') }}" class="mb-4">
            <div class="flex flex-wrap justify-end -mx-2">
                <!-- Search Input -->
                <div class="w-full sm:w-1/2 md:w-1/4 px-2 mb-4 sm:mb-0">
                    <input
                        type="text"
                        name="search"
                        class="input input-bordered w-full"
                        placeholder="Search..."
                        value="{{ request('search') }}"
                    >
                </div>

                <!-- Role Filter -->
                <div class="w-full sm:w-1/2 md:w-1/4 px-2 mb-4 sm:mb-0">
                    <select name="role" class="input input-bordered w-full">
                        <option value="">All Roles</option>
                        <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="customer" {{ request('role') === 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>

                <!-- Name Sort Order Filter -->
                <div class="w-full sm:w-1/2 md:w-1/4 px-2 mb-4 sm:mb-0">
                    <select name="sort" class="input input-bordered w-full">
                        <option value="">Sort by Name</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>A to Z</option>
                        <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Z to A</option>
                    </select>
                </div>

                <!-- Items Per Page Selector -->
                <div class="w-full sm:w-1/2 md:w-1/4 px-2 mb-4 sm:mb-0">
                    <select name="per_page" class="input input-bordered w-full">
                        <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10 per page</option>
                        <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25 per page</option>
                        <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50 per page</option>
                    </select>
                </div>

                <!-- Apply Button -->
                <div class="w-auto px-2">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </div>
            </div>
        </form>

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
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="whitespace-nowrap">
                            <span class="truncate block w-32" title="{{ $user->email }}">{{ $user->email }}</span>
                        </td>
                        <td>{{ $user->is_admin ? 'Admin' : 'Customer' }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td class="text-center">
                            <!-- Trigger Modal -->
                            <button class="btn btn-secondary btn-sm" onclick="openModal({{ $user->id }})">View Details</button>
                        </td>
                        <td class="text-center">
                            @if ($user->id !== auth()->id())
                                <a href="{{ route('AdminUserEdit', $user->id) }}" class="btn btn-primary join-item">Edit</a>
                                <form action="{{ route('AdminUserDestroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn join-item" onclick="return confirm('Are you sure?')">Delete</button>
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
        <div class="mt-4 flex justify-center">
            <div class="join">
                <!-- Previous Page Button -->
                @if ($users->onFirstPage())
                    <button class="join-item btn btn-disabled">Previous</button>
                @else
                    <a href="{{ $users->previousPageUrl() }}&{{ http_build_query(request()->except('page')) }}" class="join-item btn">Previous</a>
                @endif

                <!-- Page Number Buttons -->
                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    @if ($page == $users->currentPage())
                        <button class="join-item btn btn-active btn-primary">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}&{{ http_build_query(request()->except('page')) }}" class="join-item btn">{{ $page }}</a>
                    @endif
                @endforeach

                <!-- Next Page Button -->
                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}&{{ http_build_query(request()->except('page')) }}" class="join-item btn">Next</a>
                @else
                    <button class="join-item btn btn-disabled">Next</button>
                @endif
            </div>
        </div>

        <!-- User Details Modal -->
        @foreach ($users as $user)
            <div id="modal-{{ $user->id }}" class="modal">
                <div class="modal-box w-11/12 max-w-3xl">
                    <h3 class="font-bold text-2xl mb-4 text-center">User Details</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <p class="font-semibold text-lg">Full Name:</p>
                            <p class="text-gray-700">{{ $user->full_name }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Email:</p>
                            <p class="text-gray-700">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Role:</p>
                            <p class="text-gray-700">{{ $user->is_admin ? 'Admin' : 'Customer' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Phone:</p>
                            <p class="text-gray-700">{{ $user->phone ?? 'User has not updated phone number' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Address:</p>
                            <p class="text-gray-700">{{ $user->address ?? 'User has not updated address' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Billing Address:</p>
                            <p class="text-gray-700">{{ $user->billing_address ?? 'User has not updated billing address' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Shipping Address:</p>
                            <p class="text-gray-700">{{ $user->shipping_address ?? 'User has not updated shipping address' }}</p>
                        </div>
                    </div>
                    <div class="modal-action mt-6">
                        <button class="btn btn-outline btn-primary" onclick="closeModal({{ $user->id }})">Close</button>
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
