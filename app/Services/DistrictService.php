<?php
namespace App\Services;

use App\DataTransferObjects\DistrictDataTransferObject;
use App\Infrastructure\Repositories\Contracts\DistrictRepositoryInterface;

class DistrictService extends BaseService
{
    protected $dataTransferObjectClass = DistrictDataTransferObject::class;

    public function __construct(DistrictRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}