<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the submission of the contact form.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
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
            ],
            'phone' => [
                'required',
                'regex:/^[0-9]{10,15}$/',
            ],
            'subject' => [
                'required',
                'string',
                'max:255',
            ],
            'message' => [
                'required',
                'string',
                'max:500',
            ],
        ]);

        $contactData = $request->all();

        // Save the query to the database
        \App\Models\ContactQuery::create($contactData);

        // Send email using Mailtrap
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormMail($contactData));

        return redirect()->route('contact.page')->with('success', 'Thank you for contacting us. You will hear back soon.');
    }
}
