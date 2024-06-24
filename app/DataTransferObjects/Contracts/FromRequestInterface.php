<?php

namespace App\DataTransferObjects\Contracts;


use Illuminate\Http\Request;

interface FromRequestInterface
{
    public static function fromRequest(Request $request);
}

//public static function fromRequest(Request $request)
//{
//    return new self(
//        $request->input('name'),
//        $request->input('logo'),
//        $request->input('src_id'),
//        $request->input('status')
//    );
//}