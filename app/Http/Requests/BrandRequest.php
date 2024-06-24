<?php

namespace App\Http\Requests;


use App\Http\Requests\Contracts\RequestAwareInterface;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends BaseRequest implements RequestAwareInterface
{

    public function rules(): array
    {
        return [
            'name' => 'required',
            'logo' => 'required',
            'src_id' => 'required|numeric|unique:brands',
            'status' => 'required|numeric',
        ];
    }
}
