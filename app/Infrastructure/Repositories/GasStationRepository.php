<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\Contracts\GasStationRepositoryInterface;
use App\Models\GasStation;
use Illuminate\Database\Eloquent\Model;

class GasStationRepository extends BaseRepository implements GasStationRepositoryInterface
{
    public function __construct(GasStation $model)
    {
        parent::__construct($model);
    }

    public function findGasStationBySourceId(int $src_id): ?Model
    {
        return $this->model->where('src_id', $src_id)->first();
    }
}