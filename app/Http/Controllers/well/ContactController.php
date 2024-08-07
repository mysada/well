<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ContactController
 * @package App\Http\Controllers\well
 *
 * This controller handles the submission of contact form data.
 */
class ContactController extends Controller
{
    /**
     * MANISH KUMAR
     * Handle the submission of the contact form.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * Validates the incoming request data for the contact form, including:
     * - name: required, string, max length of 255, only alphabetic characters and spaces allowed
     * - email: required, valid email format, max length of 255, only certain characters allowed
     * - phone: optional, valid format with 10-15 digits
     * - subject: required, string, max length of 255, only alphanumeric characters and spaces allowed
     * - message: required, string, max length of 500, only certain characters allowed
     *
     * After validation, processes the form submission and redirects back to the contact page
     * with a success message.
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

        // Process the form submission

        return redirect()->route('contact.page')->with('success', 'Thank you for contacting us. You will heard back soon.');
    }
}
