<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model)
    {
    }

    public function all(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = $this->model->query();
        if (count($filters)) {
            $query->where($filters);
        }

        return $query->paginate($perPage);
//        return $query->paginate($perPage)->through(function($model) use ($DataTransferObjectClass) {
//            if (/*$DataTransferObjectClass*/ false) {
//                return $DataTransferObjectClass::fromModel($model);
//            } else {
//                return $model;
//            }
//        });
       // return $this->model->all();
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id): Model
    {
        $model = $this->find($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->find($id);
        $model->delete();
    }

    public function find($id): Model
    {
        return $this->model->findOrFail($id);
    }

}