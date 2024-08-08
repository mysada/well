<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutReq extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Card Information
            'card-number'      => 'required|regex:/^\d{16}$/',
            'card-name'        => 'required|regex:/^[a-zA-Z\s]+$/',
            'card-expiry'      => 'required|regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
            'card-cvc'         => 'required|regex:/^\d{3}$/',
            'card-type'        => 'required|in:Visa,MasterCard,American Express,Discover',

            // Shipping Information
            'shipping-name'    => 'required|regex:/^[a-zA-Z\s]+$/',
            'shipping-address' => 'required|regex:/^[a-zA-Z0-9\s,\'-]+$/',
            'shipping-city'    => 'required|regex:/^[a-zA-Z\s]+$/',
            'shipping-country' => 'required|exists:countries,id',
            'shipping-zip'     => 'required|regex:/^[a-zA-Z0-9\s-]+$/',
            'shipping-email'   => 'required|email',
            'shipping-phone'   => 'required|regex:/^\d{10,15}$/',

            // Billing Information
            'billing-name'     => 'nullable|regex:/^[a-zA-Z\s]+$/',
            'billing-address'  => 'nullable|regex:/^[a-zA-Z0-9\s,\'-]+$/',
            'billing-city'     => 'nullable|regex:/^[a-zA-Z\s]+$/',
            'billing-country'  => 'nullable|exists:countries,id',
            'billing-zip'      => 'nullable|regex:/^[a-zA-Z0-9\s-]+$/',
            'billing-email'    => 'nullable|email',
            'billing-phone'    => 'nullable|regex:/^\d{10,15}$/',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // Card Information
            'card-number.required'      => 'Please enter a valid 16-digit card number.',
            'card-number.regex'         => 'Card number must be exactly 16 digits.',
            'card-name.required'        => 'Please enter a valid cardholder name.',
            'card-name.regex'           => 'Cardholder name must only contain letters and spaces.',
            'card-expiry.required'      => 'Please enter a valid expiry date in MM/YY format.',
            'card-expiry.regex'         => 'Expiry date must be in MM/YY format.',
            'card-cvc.required'         => 'Please enter a valid 3-digit CVC.',
            'card-cvc.regex'            => 'CVC must be exactly 3 digits.',
            'card-type.required'        => 'Please select a card type.',
            'card-type.in'              => 'Please select a valid card type.',

            // Shipping Information
            'shipping-name.required'    => 'Please enter a valid name.',
            'shipping-name.regex'       => 'Name must only contain letters and spaces.',
            'shipping-address.required' => 'Please enter a valid address.',
            'shipping-address.regex'    => 'Address can include letters, numbers, spaces, commas, and dashes.',
            'shipping-city.required'    => 'Please enter a valid city.',
            'shipping-city.regex'       => 'City must only contain letters and spaces.',
            'shipping-country.required' => 'Please select a country.',
            'shipping-country.exists'   => 'Selected country is not valid.',
            'shipping-zip.required'     => 'Please enter a valid ZIP/Postal Code.',
            'shipping-zip.regex'        => 'ZIP/Postal Code can include letters, numbers, spaces, and dashes.',
            'shipping-email.required'   => 'Please enter a valid email address.',
            'shipping-email.email'      => 'Please enter a valid email address.',
            'shipping-phone.required'   => 'Please enter a valid phone number.',
            'shipping-phone.regex'      => 'Phone number must be between 10 and 15 digits.',

            // Billing Information
            'billing-name.regex'        => 'Name must only contain letters and spaces.',
            'billing-address.regex'     => 'Address can include letters, numbers, spaces, commas, and dashes.',
            'billing-city.regex'        => 'City must only contain letters and spaces.',
            'billing-country.exists'    => 'Selected country is not valid.',
            'billing-zip.regex'         => 'ZIP/Postal Code can include letters, numbers, spaces, and dashes.',
            'billing-email.email'       => 'Please enter a valid email address.',
            'billing-phone.regex'       => 'Phone number must be between 10 and 15 digits.',
        ];
    }

}
