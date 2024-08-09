@extends('layouts.app')
@section('content')
@vite('resources/sass/wishlist.scss')
<!-- Wishlist Section -->
<section class="wishlist-section">
    <div class="container">
        <h1 style="font-size: 50px;">Wishlist</h1>

        @if($wishlists->isEmpty())
        <div class="empty-wishlist">
            <p>Looks like you haven't added anything to your wishlist yet.</p>
            <a href="{{ url('/products') }}" class="btn btn-primary">Start Shopping</a>
        </div>
        @else
        @foreach($wishlists as $wishlist)
        <div class="product-item">
            <div class="product-info">
                <img src="{{asset($wishlist->product->image_url)}}" alt="Product 1">
                <div>
                    <div class="product-title">{{$wishlist->product->name}}</div>
                    <div class="product-description">{{$wishlist->product->description}}</div>
                    <div class="product-price">${{$wishlist->product->price}}</div>
                </div>
            </div>
            <div class="product-actions">
                <form action="{{ route('WishlistAddToCart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$wishlist->product->id}}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
                <form action="{{ route('WishlistDestroy', $wishlist->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-remove" style="color: #666; margin-left: 20px;">Remove</button>
                </form>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</section>
@endsection
