<?php

namespace App\Http\Requests;


interface BaseRequestInterface
{
    public function rules(): array;
}
