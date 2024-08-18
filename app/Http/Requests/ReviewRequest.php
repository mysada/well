<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Return true if the user is authorized to make this request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'product_id'  => 'required|exists:products,id',
          'rating'      => 'required|integer|min:1|max:5',
          'review_text' => [
            'required',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s.]+$/',
          ],
          'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'review_text.regex' => 'The review text may only contain valid text',
        ];
    }

}
