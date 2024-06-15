<?php
namespace App\Services;

use App\Infrastructure\Repositories\BaseRepositoryInterface;

class BrandService extends BaseService
{
    public function __construct(protected BaseRepositoryInterface $repository) 
    {
        parent::__construct($this->repository);
    }
}