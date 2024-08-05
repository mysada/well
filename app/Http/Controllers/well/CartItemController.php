<?php

namespace App\Http\Controllers\well;

use App\Http\Requests\CartItemReq;
use App\Models\CartItem;
use Auth;

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
    public function store(CartItemReq $request)
    {
        $cart = $request->validated();
        CartItem::create([
          'user_id'    => Auth::id(),
          'product_id' => $cart['product_id'],
          'quantity'   => $cart['quantity'],
        ]);

        return redirect()->route('CartItemIndex')->with(
          'success',
          'Add to cart successfully.'
        );
    }

    /**
     * update the number of the cart
     */
    public function update(CartItemReq $request, string $id)
    {
        //
    }

    /**
     * delete the cart
     */
    public function destroy(string $id)
    {
        $product = CartItem::where("user_id", Auth::id())
                           ->where('id', $id)
                           ->first();
        if ($product) {
            $product->delete();

            return redirect()->route('CartItemIndex')->with(
              'success',
              "Remove $product[name] successfully."
            );
        }
    }

}
