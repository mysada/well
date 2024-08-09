@extends('admin.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Category List</h1>
    <a href="{{ route('AdminCategoryCreate') }}" class="btn btn-primary mb-4">Add New Category</a>
    <table class="table w-full">
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
                    <img src="{{ asset( $category->image.'.jpg') }}" alt="{{ $category->name }}" class="w-24">
                </td>
                <td class="flex space-x-2">
                    <a href="{{ route('AdminCategoryEdit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('AdminCategoryDestroy', $category->id) }}" method="POST" onsubmit="return confirmDeletion();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-default">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDeletion() {
        return confirm('Are you sure you want to delete this category?');
    }
</script>
@endsection
