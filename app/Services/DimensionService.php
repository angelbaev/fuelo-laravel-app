<?php
namespace App\Services;

use App\DataTransferObjects\DimensionDataTransferObject;
use App\Infrastructure\Repositories\Contracts\DimensionRepositoryInterface;

class DimensionService extends BaseService
{
    protected $dataTransferObjectClass = DimensionDataTransferObject::class;

    public function __construct(DimensionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function findByName(string $name) {
        $model = $this->repository->findByName($name);

        if (!$model) {
            return null;
        }
        return $this->convertToDataTransferObject($model);
    }
}