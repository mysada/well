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
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <img src="{{ asset('images/home/' . $category->image_path) }}" alt="{{ $category->name }}" style="max-width: 100px;">
                </td>
                <td>
                    <a href="{{ route('AdminCategoryEdit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('AdminCategoryDestroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDeletion() {
        return confirm('Are you sure you want to delete this category? ');
    }
</script>
@endsection
