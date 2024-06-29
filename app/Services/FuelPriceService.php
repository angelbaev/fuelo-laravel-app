<?php
namespace App\Services;

use App\DataTransferObjects\Contracts\DataTransferObjectAwareInterface;
use App\DataTransferObjects\FuelDataTransferObject;
use App\DataTransferObjects\FuelPriceDataTransferObject;
use App\Infrastructure\Repositories\Contracts\FuelPriceRepositoryInterface;

class FuelPriceService extends BaseService
{
    protected $dataTransferObjectClass = FuelPriceDataTransferObject::class;


    public function __construct(FuelPriceRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function findPriceByFuelAndDate(FuelDataTransferObject $fuel, string $date) {
        $model = $this->repository->findPriceByFuelIdAndDate($fuel->id, $date);

        if (!$model) {
            return null;
        }
        return $this->convertToDataTransferObject($model);
    }

}