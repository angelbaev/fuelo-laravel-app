<?php

namespace App\DataTransferObjects\Contracts;

interface FromArrayInterface
{
    public static function fromArray(array $data);
}