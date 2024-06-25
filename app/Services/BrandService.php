<?php
namespace App\Services;

use App\Infrastructure\Repositories\Contracts\BrandRepositoryInterface;
use  App\DataTransferObjects\BrandDataTransferObject;

class BrandService extends BaseService
{
    public function __construct(BrandRepositoryInterface $repository)
    {
        parent::__construct($repository, BrandDataTransferObject::class);
    }
}