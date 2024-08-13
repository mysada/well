@extends('admin.admin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between mb-4">
            <div class="text-3xl font-bold"></div>
            <a href="{{ route('AdminCategoryCreate') }}" class="btn btn-primary">Add New Category</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($categories as $category)
                <div class="card w-full bg-base-100 shadow-xl">
                    <figure>
                        <img src="{{ asset($category->image . '.jpg') }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $category->name }}</h2>
                        <div class="card-actions justify-end">
                            <a href="{{ route('AdminCategoryEdit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('AdminCategoryDestroy', $category->id) }}" method="POST" onsubmit="return confirmDeletion();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-default">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
      function confirmDeletion() {
        return confirm('Are you sure you want to delete this category?');
      }
    </script>
@endsection
