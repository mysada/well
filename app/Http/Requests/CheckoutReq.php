<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'order-id'         => 'required|exists:orders,id',
            'card-number'      => 'required|digits_between:13,16',
            'card-name'        => 'required|string',
            'card-expiry'      => [
                'required',
                'regex:/^(0[1-9]|1[0-2])([0-9]{2})$/',
                function ($attribute, $value, $fail) {
                    $month      = substr($value, 0, 2);
                    $year       = '20'.substr($value, 2, 2);
                    $expiryDate = DateTime::createFromFormat('Y-m', "$year-$month")
                        ->modify('last day of this month');
                    if ($expiryDate < new DateTime()) {
                        $fail('The card expiry date is invalid or has expired.');
                    }
                },
            ],
            'card-cvc'         => 'required|digits:3',
            'shipping-name'    => 'required|string',
            'shipping-address' => 'required|string',
            'shipping-city'    => 'required|string',
            'shipping-country' => 'required|exists:countries,code',
            'shipping-zip'     => 'required|string',
            'shipping-email'   => 'required|email',
            'shipping-phone'   => 'required|digits_between:10,15',
            'shipping-state'   => 'nullable|string',
            'ca-province'      => 'nullable|string',
            'billing-name'     => 'nullable|string',
            'billing-address'  => 'nullable|string',
            'billing-city'     => 'nullable|string',
            'billing-country'  => 'nullable|exists:countries,code',
            'billing-zip'      => 'nullable|string',
            'billing-email'    => 'nullable|email',
            'billing-phone'    => 'nullable|digits_between:10,15',
            'same-address'     => 'nullable',
        ];
    }

    /**
     * Get the custom validation error messages.
     *
     * @return array
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
