<?php

namespace App\Http\Requests;


use App\Http\Requests\Contracts\RequestAwareInterface;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends BaseRequest implements RequestAwareInterface
{

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'status' => 'required|numeric',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['src_id'] = 'required|numeric';
//            $rules['src_id'] = 'required|numeric|unique:brands,src_id,' . $this->route('brand')->src_id;
        } else {
            $rules['src_id'] = 'required|numeric|unique:brands';
        }

        return $rules;
    }
}
