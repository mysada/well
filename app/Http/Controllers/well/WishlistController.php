<?php

namespace App\Http\Controllers\well;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Wishlist::all();
        $title    = 'My Wishlist';

        return view('well.pages.wishlist', compact('wishlist', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
