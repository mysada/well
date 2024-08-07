@extends('layouts.app')
@vite('resources/js/cart.js')

@section('content')
    <section class="cart py-5">
        <div class="container">
            <h2 class="cart-title">Shopping Cart</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if($cartItems->isEmpty())
                <p>Your cart is empty.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        @foreach($cartItems as $cartItem)
                            <tr>
                                <td><img src="{{ asset($cartItem->product->image_url) }}" alt="{{ $cartItem->product->name }}" class="img-thumbnail" style="width: 100px;"></td>
                                <td>{{ $cartItem->product->name }}</td>
                                <td>${{ number_format($cartItem->product->price, 2) }}</td>
                                <td>
                                    <div class="input-group">
                                        <button class="btn btn-outline-secondary btn-sm qty-btn" type="button" data-action="minus" data-cart-item-id="{{ $cartItem->id }}">-</button>
                                        <input type="number" name="quantity" class="form-control w-25 text-center" value="{{ $cartItem->quantity }}" min="1" readonly>
                                        <button class="btn btn-outline-secondary btn-sm qty-btn" type="button" data-action="add" data-cart-item-id="{{ $cartItem->id }}">+</button>
                                    </div>
                                </td>
                                <td>${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}</td>
                                <td>
                                    <form action="{{ route('CartItemDestroy', $cartItem->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection
