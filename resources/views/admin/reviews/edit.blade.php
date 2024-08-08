
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Review</h1>
    <form action="{{ route('AdminReviewUpdate', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="rating">Rating</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5 Star</option>
                <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4 Star</option>
                <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3 Star</option>
                <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2 Star</option>
                <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1 Star</option>
            </select>
        </div>
        <div class="form-group">
            <label for="content">Review</label>
            <textarea name="content" id="content" class="form-control" required>{{ $review->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Review</button>
    </form>
</div>
@endsection
