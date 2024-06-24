<?php

namespace App\DataTransferObjects\Contracts;


use Illuminate\Database\Eloquent\Collection;

interface FromCollectionInterface
{
    public static function fromCollection(Collection $collection);
}