<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\Contracts\FuelPriceRepositoryInterface;
use App\Models\FuelPrice;
use Illuminate\Database\Eloquent\Model;

class FuelPriceRepository extends BaseRepository implements FuelPriceRepositoryInterface
{
    public function __construct(FuelPrice $model)
    {
        parent::__construct($model);
    }

    public function findPriceByFuelIdAndDate(string $fuel_id, string $date): ?Model
    {
        $conditions = [
            ['fuel_id', '=', $fuel_id],
            ['date', '=', $date]
        ];

        return $this->model->where($conditions)->first();
    }
}