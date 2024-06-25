<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\Contracts\DistrictRepositoryInterface;
use App\Models\District;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    public function __construct(District $model)
    {
        parent::__construct($model);
    }
}