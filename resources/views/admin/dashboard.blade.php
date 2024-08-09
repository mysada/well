@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Reviews</h5>
                    <p class="card-text">View, edit, and delete product reviews.</p>
                    <a href="{{ route('AdminReviewList') }}" class="btn btn-primary">Go to Reviews</a>
                </div>
            </div>
        </div>
        <!-- Add more cards for other admin functionalities -->
    </div>
</div>
@endsection
