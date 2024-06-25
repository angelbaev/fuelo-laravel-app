<?php
namespace App\Services;

use App\DataTransferObjects\FuelDataTransferObject;
use App\Infrastructure\Repositories\Contracts\FuelRepositoryInterface;

class FuelService extends BaseService
{
    public function __construct(FuelRepositoryInterface $repository)
    {
        parent::__construct($repository, FuelDataTransferObject::class);
    }
}