@extends('admin.admin')

@section('content')
    <div class="container">

        <!-- Filter Form -->
        <div class="flex justify-end w-full">
            <form action="{{ route('admin.queries') }}" method="GET" class="flex join">
                <select name="status" class="select select-bordered join-item">
                    <option value="">All Statuses</option>
                    <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress
                    </option>
                    <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
                <button type="submit" class="btn btn-primary join-item">Filter</button>
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
                    @foreach($items as $query)
                        <tr class="hover">
                            <td>
                                <a class="link link-primary" href="{{ route('admin.queries.show', $query->id) }}">
                                    {{ $query->id }}
                                </a>
                            </td>
                            <td>{{ $query->name }}</td>
                            <td>{{ $query->email }}</td>
                            <td>{{ $query->phone }}</td>
                            <td>{{ $query->subject }}</td>
                            <td>{{ $query->message }}</td>
                            <td>{{ $query->created_at}}</td>
                            <td>
                    <span class="badge badge-{{ $query->status == 'resolved' ? 'success' : ($query->status == 'in_progress' ? 'warning' : 'primary') }}">
                        {{ ucfirst($query->status) }}
                    </span>
                            </td>
                            <td class="px-0">
                                <div class="flex join">
                                    <a href="{{ route('admin.queries.edit', $query->id) }}"
                                       class="btn btn-primary join-item">Edit</a>
                                    <form action="{{ route('admin.queries.destroy', $query->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this query?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger join-item">Delete</button>
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
