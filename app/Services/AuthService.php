<?php
namespace App\Services;

use App\Infrastructure\Repositories\Contracts\AuthRepositoryInterface;

class AuthService
{
    public function __construct(protected AuthRepositoryInterface $repository) 
    {
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function attempt(array $credentials) {
        return auth()->attempt($credentials);
    }

}