<?php

namespace App\Infrastructure\Repositories;

use App\Models\Brand;
use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\Contracts\BrandRepositoryInterface;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }
}