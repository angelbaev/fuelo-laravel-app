<?php

namespace App\Http\Requests\Contracts;


interface BaseRequestInterface
{
    public function rules(): array;
}
