<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
          'description' => ['required', 'max:300'],
        ];
    }
}
