<?php

namespace App\Infrastructure\Repositories;

use App\Models\Brand;
use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\Contracts\BrandRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }

    public function findBrandBySourceId(int $src_id): ?Model
    {
        return $this->model->where('src_id', $src_id)->first();
    }
}