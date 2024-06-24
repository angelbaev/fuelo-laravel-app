<?php
namespace App\Services;

use App\DataTransferObjects\Contracts\DataTransferObjectAwareInterface;
use App\Infrastructure\Repositories\Contracts\BaseRepositoryInterface;

class BaseService
{
    public function __construct(protected BaseRepositoryInterface $repository)
    {
      
    }

    public function create(DataTransferObjectAwareInterface $dataTransferObject)
    {
       $data = $dataTransferObject->toArray();

        return $this->repository->create($data);
    }

    public function update(DataTransferObjectAwareInterface $dataTransferObject, $id)
    {
        $data = $dataTransferObject->toArray();

        return $this->repository->update($data, $id);
    }


    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function all(array $filters = [], int $perPage = 15, $DataTransferObjectClass = null)
    {
         //https://sandulat.com/moving-from-laravel-api-resources-to-dtos/
        return $this->repository->all($filters, $perPage, $DataTransferObjectClass);
    }
    
    public function find($id)
    {
        return $this->repository->find($id);
    }

}