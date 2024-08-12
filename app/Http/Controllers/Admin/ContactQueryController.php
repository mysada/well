<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;

class ContactQueryController extends Controller
{
    /**
     * Display a listing of the contact queries.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch the queries ordered by creation date in descending order
        $queries = ContactQuery::orderBy('created_at', 'desc')->get();
        return view('admin.pages.queries.index', compact('queries'));
    }
}
