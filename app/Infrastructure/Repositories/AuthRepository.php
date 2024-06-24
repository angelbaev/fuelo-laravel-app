<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Repositories\Contracts\AuthRepositoryInterface;
use App\Models\User;

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