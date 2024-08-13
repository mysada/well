@extends('admin.admin')

@section('content')
<div class="container mx-auto p-4 flex justify-center ">
    <!-- Form to create a new category -->
    <div class="bg-base-100 flex-1 max-w-screen-sm shadow-xl rounded-lg overflow-hidden p-4">
        <form action="{{ route('AdminCategoryStore') }}" method="POST" enctype="multipart/form-data" class="w-full space-y-4">
            @csrf
            <div class="form-control">
                <label class="label" for="name">
                    <span class="label-text">Category Name</span>
                </label>
                <input type="text" name="name" id="name" class="input input-bordered w-full" required>
            </div>

            <div class="form-control">
                <label class="label" for="image">
                    <span class="label-text">Category Image</span>
                </label>
                <input type="file" name="image" id="image" class="file-input file-input-bordered w-full" required>
            </div>

            <div class="form-control">
                <button type="submit" class="btn  btn-primary">Create Category</button>
            </div>
        </form>

    </div>
</div>

@endsection

