<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Fuelo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Abaev\Fuelo\FueloClientApi::class;
    }
}