<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required',
            'logo' => 'required',
            'src_id' => 'required|numeric|unique:brands',
        ];
    }
}
