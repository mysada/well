<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartItemReq extends FormRequest
{

    public function rules(): array
    {
        return [
          'product_id' => ['required', 'integer', 'exists:products,id'],
          'quantity'   => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

}
