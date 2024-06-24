<?php

namespace App\DataTransferObjects\Contracts;

use App\Models\Contracts\ModelAwareInterface;

interface FromModelInterface
{
    public static function fromModel(ModelAwareInterface $model);
}