@extends('admin.admin')

@section('content')
    <div class="container">
        <h1>Manage Reviews</h1>
        <form action="{{ route('admin.reviews.filter') }}" method="GET">
            <label for="rating">Filter by Rating:</label>
            <select name="rating" id="rating" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="5">5 Star</option>
                <option value="4">4 Star</option>
                <option value="3">3 Star</option>
                <option value="2">2 Star</option>
                <option value="1">1 Star</option>
            </select>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>User</th>
                    <th>Rating</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->product->name }}</td>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->content }}</td>
                        <td>
                            <a href="{{ route('AdminReviewEdit', $review->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('AdminReviewDestroy', $review->id) }}" method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reviews->links() }}
    </div>
@endsection
