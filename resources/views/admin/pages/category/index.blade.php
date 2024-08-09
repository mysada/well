@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Category List</h1>
    <a href="{{ route('AdminCategoryCreate') }}" class="btn btn-primary">Add New Category</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
