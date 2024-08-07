<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\well\CartItemController;

class CheckoutController extends Controller
{
public function showCheckout()
{
$countries = $this->getCountries();
$cartItems = (new CartItemController)->fetchCartItems();

return view('well.order.checkout', compact('countries', 'cartItems'));
}

private function getCountries()
{
return [
['code' => 'US', 'name' => 'United States'],
['code' => 'CA', 'name' => 'Canada'],
];
}

public function process(Request $request)
{

return redirect()->route('order.confirmation');
}
}
