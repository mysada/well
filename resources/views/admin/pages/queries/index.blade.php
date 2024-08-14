@extends('admin.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Contact Queries</h1>

    <!-- Filter Form -->
    <div class="mb-6">
        <form action="{{ route('admin.queries') }}" method="GET" class="flex gap-4 items-center">
            <select name="status" class="select select-bordered w-1/3">
                <option value="">All Statuses</option>
                <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>

    <!-- Queries Table -->
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Received At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($queries as $query)
            <tr class="hover">
                <td>{{ $query->id }}</td>
                <td>{{ $query->name }}</td>
                <td>{{ $query->email }}</td>
                <td>{{ $query->phone }}</td>
                <td>{{ $query->subject }}</td>
                <td>{{ $query->message }}</td>
                <td>{{ $query->created_at->format('F d, Y h:i A') }}</td>
                <td>
                    <span class="badge badge-{{ $query->status == 'resolved' ? 'success' : ($query->status == 'in_progress' ? 'warning' : 'primary') }}">
                        {{ ucfirst($query->status) }}
                    </span>
                </td>
                <td>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.queries.show', $query->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.queries.edit', $query->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.queries.destroy', $query->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this query?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
