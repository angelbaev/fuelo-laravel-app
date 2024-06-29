<?php
namespace App\Services;

use App\DataTransferObjects\Contracts\DataTransferObjectAwareInterface;
use App\Infrastructure\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected $dataTransferObjectClass;

    public function __construct(protected BaseRepositoryInterface $repository)
    {
      
    }

    public function create(DataTransferObjectAwareInterface $dataTransferObject)
    {
       $data = $dataTransferObject->toStoreArray();

        return $this->repository->create($data);
    }

    public function update(DataTransferObjectAwareInterface $dataTransferObject, $id)
    {
        $data = $dataTransferObject->toStoreArray();

        return $this->repository->update($data, $id);
    }


    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function all(array $filters = [], int $perPage = 15)
    {
         //https://sandulat.com/moving-from-laravel-api-resources-to-dtos/
        return $this->repository->all($filters, $perPage)->through(function($model){
            return $this->convertToDataTransferObject($model);
        });
    }
    
    public function find($id)
    {
        return $this->convertToDataTransferObject(
            $this->repository->find($id)
        );
    }

    protected function convertToDataTransferObject(Model $model)
    {
        return call_user_func([$this->dataTransferObjectClass, 'fromModel'], $model);
    }

}