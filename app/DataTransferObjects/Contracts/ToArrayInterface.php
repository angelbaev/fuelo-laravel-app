<?php

namespace App\DataTransferObjects\Contracts;

interface ToArrayInterface
{
    public function toArray(): array;
    public function toStoreArray(): array;
}