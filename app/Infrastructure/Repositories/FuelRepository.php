<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\Contracts\FuelRepositoryInterface;
use App\Models\Fuel;

class FuelRepository extends BaseRepository implements FuelRepositoryInterface
{
    public function __construct(Fuel $model)
    {
        parent::__construct($model);
    }
}