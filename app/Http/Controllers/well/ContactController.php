<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\ContactQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    /**
     * Handle the submission of the contact form.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submit(Request $request)
    {
        $request->validate([
          'name'    => [
            'required',
            'string',
            'max:255',
            'regex:/^[a-zA-Z\s]*$/',
          ],
          'email'   => [
            'required',
            'email',
            'max:255',
          ],
          'phone'   => [
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
        ], [
          'name.required' => 'Please enter your name.',
          'name.string'   => 'Name should only contain alphabetic characters and spaces.',
          'name.max'      => 'Name cannot exceed 255 characters.',
          'name.regex'    => 'Name can only contain letters and spaces.',

          'email.required' => 'Please enter your email address.',
          'email.email'    => 'Please enter a valid email address.',
          'email.max'      => 'Email cannot exceed 255 characters.',

          'phone.required' => 'Please enter your phone number.',
          'phone.regex'    => 'Phone number must be between 10 and 15 digits.',

          'subject.required' => 'Please enter a subject.',
          'subject.string'   => 'Subject should only contain alphanumeric characters and spaces.',
          'subject.max'      => 'Subject cannot exceed 255 characters.',

          'message.required' => 'Please enter your message.',
          'message.string'   => 'Message should only contain certain characters.',
          'message.max'      => 'Message cannot exceed 500 characters.',
        ]);

        $contactData = $request->all();

        // Save the query to the database
        ContactQuery::create($contactData);

        // Send email
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(
          new ContactFormMail($contactData)
        );

        // Redirect back with success message
        return redirect()->route('contact.page')->with(
          'success',
          'Thank you for contacting us. You will hear back soon.'
        );
    }

}
