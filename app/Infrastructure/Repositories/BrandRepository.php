<?php

namespace App\Infrastructure\Repositories;

use App\Models\Brand;
use App\Infrastructure\Repositories\BaseRepository;

class BrandRepository extends BaseRepository
{
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }
}