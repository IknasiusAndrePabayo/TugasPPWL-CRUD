<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'kode' => ['required', 'unique:products', 'max:100'],
          'name' => ['required', 'max:100'],
          'price' => ['required', 'numeric', 'min:1'],
          'stock' => ['required', 'numeric', 'min:0'],
        ];
    }
}
