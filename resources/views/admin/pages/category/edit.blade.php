@extends('admin.admin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <div></div>
            <a href="{{ route('AdminCategoryList') }}" class="btn btn-primary">Back to Category List</a>
        </div>

        <div class="w-full flex justify-center">
            <div class="bg-base-100 max-w-screen-lg shadow-lg rounded-lg overflow-hidden min-w-[560px]">
                <div class="md:flex">
                    <div class="w-1/3 flex justify-center items-center">
                        <figure>
                            <img class="w-full h-full object-cover" src="{{ asset($category->image) }}" alt="{{ $category->name }}" >
                        </figure>
                    </div>
                    <div class="w-2/3 p-6">
                        <form class="flex flex-col justify-between gap-8" action="{{ route('AdminCategoryUpdate', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-control mb-4">
                                <label class="label" for="name">
                                    <span class="label-text">Category Name</span>
                                </label>
                                <input type="text" name="name" id="name" class="input input-bordered w-full" value="{{ $category->name }}" required>
                            </div>

                            <div class="form-control mb-4">
                                <label class="label" for="image">
                                    <span class="label-text">Category Image</span>
                                </label>
                                <input type="file" name="image" id="image" class="file-input file-input-bordered w-full">
                            </div>

                            <div class="form-control mb-4">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
