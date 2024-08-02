<?php

namespace App\Http\Controllers\well;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{

    /**
     * display the cart of user
     */
    public function index()
    {
        $carts = CartItem::all();
        $title = 'Shopping Cart';

        return view('well.pages.cart', compact('carts', 'title'));
    }

    /**
     * add product into cart
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * update the number of the cart
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * delete the cart
     */
    public function destroy(string $id)
    {
        //
    }

}
