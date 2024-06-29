<?php

namespace App\Infrastructure\Repositories;

use App\DataTransferObjects\DimensionDataTransferObject;
use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\Contracts\DimensionRepositoryInterface;
use App\Models\Dimension;
use Illuminate\Database\Eloquent\Model;

class DimensionRepository extends BaseRepository implements DimensionRepositoryInterface
{
    public function __construct(Dimension $model)
    {
        parent::__construct($model);
    }

    public function findByName(string $name): ?Model
    {
        return $this->model->where('name', $name)->first();
    }
}