<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateBrandRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
          'kode' => [
              'required',
              'max:100',
              Rule::unique('brands')->ignore($this->id),
          ],
          'name' => ['required', 'max:100'],
          'description' => ['required', 'max:300'],
        ];
    }
}
