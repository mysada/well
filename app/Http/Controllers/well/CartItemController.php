<?php

namespace App\Http\Controllers\well;

use App\Http\Requests\CartItemReq;
use App\Models\CartItem;
use Auth;
use Illuminate\Http\RedirectResponse;

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

        return $this->success('Add to cart successfully.');
    }

    /**
     * update the number of the cart
     */
    public function update(CartItemReq $request, string $id)
    {
        $cart     = $request->validated();
        $cartItem = CartItem::find($id);
        if ($cartItem) {
            $cartItem->update($cart);

            return self::success("Update successfully");
        }

        return self::error('Update failed');
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

            return $this->success("Remove $product[name] successfully");
        }

        return $this->error("Remove failed");
    }

    /**
     * @param $msg
     *
     * @return RedirectResponse
     */
    private function success($msg): RedirectResponse
    {
        return redirect()->route('CartItemIndex')->with('success', $msg);
    }

    private function error($msg): RedirectResponse
    {
        return redirect()->route('CartItemIndex')->with('error', $msg);
    }

}
