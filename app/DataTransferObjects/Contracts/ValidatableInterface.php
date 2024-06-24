<?php

namespace App\DataTransferObjects\Contracts;

interface ValidatableInterface
{
    public function validate(): void;
}