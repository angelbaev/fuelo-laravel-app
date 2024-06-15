<?php

namespace App\Infrastructure\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FailedValidationRequest
{
    protected function failedValidation(Validator $validator): void
    {
        $jsonResponse = response()->json(['errors' => $validator->errors()], 409);

        throw new HttpResponseException($jsonResponse);
    }   

}
