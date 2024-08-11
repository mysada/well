@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between mb-4">
            <div class="opacity-75">
                @if($search)
                    Search
                    <span class="badge badge-primary badge-outline">{{ $search }}</span>
                    found {{ count($items) }} result(s)
                @endif
            </div>
            <div class="flex join">
                <label class="input input-bordered flex items-center gap-2 join-item">
                    <form action="">
                        <input type="text" name="search" value="{{ old('search', $search) }}"
                               placeholder="Search...">
                    </form>
                </label>
                @if($search)
                    <a href="{{ route('AdminReviewList') }}" class="btn join-item">Get All</a>
                @endif
            </div>
        </div>

        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>User</th>
                    <th>Rating</th>
                    <th>Review Text</th>
                    <th>Image</th>
                    <th>Create Time</th>
                    <th class="px-0">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $review)
                    <tr class="hover">
                        <td>{{ $review->id }}</td>
                        <td>
                            <a href="{{ route('AdminProductShow', $review->product->id) }}">
                                {{ $review->product->name }}
                            </a>
                        </td>
                        <td>
                            {{ $review->user->name }}
                        </td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ Str::limit($review->review_text, 50) }}</td>
                        <td>
                            @if($review->image)
                                <div class="avatar">
                                    <div class="mask mask-squircle h-12 w-12">
                                        <img src="{{ asset($review->image) }}" alt="Review Image"/>
                                    </div>
                                </div>
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            {{$review->created_at}}
                        </td>
                        <td class="px-0">
                            <div class="join flex w-full">
                                <a href="{{ route('AdminReviewEdit', $review->id) }}"
                                   class="btn btn-primary join-item flex-1">Edit</a>
                                <form action="{{ route('AdminReviewDestroy', $review->id) }}" method="POST"
                                      class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this review?')"
                                            class="btn join-item">Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('admin.components.pagination')
    </div>
@endsection
