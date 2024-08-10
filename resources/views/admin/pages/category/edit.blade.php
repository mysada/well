@extends('admin.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Edit Category</h1>

    <!-- Form to edit an existing category -->
    <form action="{{ route('AdminCategoryUpdate', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div class="form-control">
            <label class="label" for="name">
                <span class="label-text">Category Name</span>
            </label>
            <input type="text" name="name" id="name" class="input input-bordered w-full" value="{{ $category->name }}" required>
        </div>

        <div class="form-control">
            <label class="label" for="image">
                <span class="label-text">Category Image</span>
            </label>
            <input type="file" name="image" id="image" class="file-input file-input-bordered w-full">
        </div>

        <div class="form-control">
            <button type="submit" class="btn btn-primary">Update Category</button>
        </div>
    </form>
</div>
@endsection
