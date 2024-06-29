<?php
namespace App\Services;

use App\Infrastructure\Repositories\Contracts\BrandRepositoryInterface;
use  App\DataTransferObjects\BrandDataTransferObject;

class BrandService extends BaseService
{
    protected $dataTransferObjectClass = BrandDataTransferObject::class;

    public function __construct(BrandRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}