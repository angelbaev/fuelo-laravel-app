<?php
namespace App\Services;

use App\Infrastructure\Repositories\Contracts\BaseRepositoryInterface;
use  App\DataTransferObjects\BrandDataTransferObject;

class BrandService extends BaseService
{
    public function __construct(BaseRepositoryInterface $repository)
    {
        parent::__construct($repository, BrandDataTransferObject::class);
    }
}