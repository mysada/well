<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetDefaultAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'shipping_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_address' => 'required|regex:/^[a-zA-Z0-9\s,.-]+$/|max:255',
            'shipping_city' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_province' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_country' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_postal_code' => 'required|regex:/^[a-zA-Z0-9\s-]+$/|max:255',
            'shipping_email' => 'required|email|max:255',
            'shipping_phone' => 'required|regex:/^(\+?[0-9\s\-\(\)]*)$/|max:25|min:9',
            'billing_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'billing_address' => 'required|regex:/^[a-zA-Z0-9\s,.-]+$/|max:255',
            'billing_city' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'billing_province' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'billing_country' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'billing_postal_code' => 'required|regex:/^[a-zA-Z0-9\s-]+$/|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_phone' => 'required|regex:/^(\+?[0-9\s\-\(\)]*)$/|max:25|min:9',
        ];
    }

    /**
     * Get the custom validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'shipping_name.required' => 'The shipping name is required.',
            'shipping_name.regex' => 'The shipping name must only contain letters and spaces.',
            'shipping_address.required' => 'The shipping address is required.',
            'shipping_address.regex' => 'The shipping address format is invalid.',
            'shipping_city.required' => 'The shipping city is required.',
            'shipping_city.regex' => 'The shipping city must only contain letters and spaces.',
            'shipping_province.required' => 'The shipping province is required.',
            'shipping_province.regex' => 'The shipping province must only contain letters and spaces.',
            'shipping_country.required' => 'The shipping country is required.',
            'shipping_country.regex' => 'The shipping country must only contain letters and spaces.',
            'shipping_postal_code.required' => 'The shipping postal code is required.',
            'shipping_postal_code.regex' => 'The shipping postal code format is invalid.',
            'shipping_email.required' => 'The shipping email is required.',
            'shipping_email.email' => 'The shipping email must be a valid email address.',
            'shipping_phone.required' => 'The shipping phone is required.',
            'shipping_phone.regex' => 'The shipping phone format is invalid.',
            'billing_name.required' => 'The billing name is required.',
            'billing_name.regex' => 'The billing name must only contain letters and spaces.',
            'billing_address.required' => 'The billing address is required.',
            'billing_address.regex' => 'The billing address format is invalid.',
            'billing_city.required' => 'The billing city is required.',
            'billing_city.regex' => 'The billing city must only contain letters and spaces.',
            'billing_province.required' => 'The billing province is required.',
            'billing_province.regex' => 'The billing province must only contain letters and spaces.',
            'billing_country.required' => 'The billing country is required.',
            'billing_country.regex' => 'The billing country must only contain letters and spaces.',
            'billing_postal_code.required' => 'The billing postal code is required.',
            'billing_postal_code.regex' => 'The billing postal code format is invalid.',
            'billing_email.required' => 'The billing email is required.',
            'billing_email.email' => 'The billing email must be a valid email address.',
            'billing_phone.required' => 'The billing phone is required.',
            'billing_phone.regex' => 'The billing phone format is invalid.',
        ];
    }
}
