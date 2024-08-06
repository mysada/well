<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]*$/',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'phone' => [
                'nullable',
                'regex:/^[0-9]{10,15}$/',
            ],
            'subject' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]*$/',
            ],
            'message' => [
                'required',
                'string',
                'max:500',
                'regex:/^[a-zA-Z0-9\s.,!?]*$/',
            ],
        ]);

        // Process the form submission, e.g., send an email

        return redirect()->route('contact.page')->with('success', 'Thank you for contacting us. You will heard back soon.');
    }
}
