<?php
namespace App\Services;

use App\DataTransferObjects\GasStationDataTransferObject;
use App\Infrastructure\Repositories\Contracts\GasStationRepositoryInterface;

class GasStationService extends BaseService
{
    protected $dataTransferObjectClass = GasStationDataTransferObject::class;


    public function __construct(GasStationRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function findGasStationBySourceId(int $src_id) {
        $model = $this->repository->findGasStationBySourceId($src_id);

        if (!$model) {
            return null;
        }
        return $this->convertToDataTransferObject($model);
    }
}