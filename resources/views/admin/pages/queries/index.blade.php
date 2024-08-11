@extends('admin.admin')

@section('content')
<div class="container">
    <h1>Contact Queries</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Received At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($queries as $query)
        <tr>
            <td>{{ $query->id }}</td>
            <td>{{ $query->name }}</td>
            <td>{{ $query->email }}</td>
            <td>{{ $query->phone }}</td>
            <td>{{ $query->subject }}</td>
            <td>{{ $query->message }}</td>
            <td>{{ $query->created_at->format('F d, Y h:i A') }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
