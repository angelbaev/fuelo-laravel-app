<?php

namespace App\Infrastructure\Repositories;

use App\Models\User;
use App\Infrastructure\Repositories\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function __construct(protected User $model)
    {

    }

    public function create(array $data): ?User
    {
        return $this->model->create($data);
    }
}