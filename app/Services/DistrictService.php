<?php
namespace App\Services;

use App\DataTransferObjects\DistrictDataTransferObject;
use App\Infrastructure\Repositories\Contracts\DistrictRepositoryInterface;

class DistrictService extends BaseService
{
    public function __construct(DistrictRepositoryInterface $repository)
    {
        parent::__construct($repository, DistrictDataTransferObject::class);
    }
}