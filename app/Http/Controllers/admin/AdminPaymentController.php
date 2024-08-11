<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $title  = 'Payment Management - List';

        $payments = Payment::query()
                           ->when($search, function ($query, $search) {
                               $query->where(
                                 'payer_name',
                                 'like',
                                 "%{$search}%"
                               )
                                     ->orWhere('method', 'like', "%{$search}%")
                                     ->orWhere('status', 'like', "%{$search}%");
                           })->orderByDesc('id')
                           ->paginate(10);

        return view(
          'admin.pages.payment.index',
          compact(
            'payments',
            'title',
            'search'
          )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
