<?php
namespace App\Services;

use App\Infrastructure\Repositories\Contracts\AuthRepositoryInterface;
use App\DataTransferObjects\Contracts\DataTransferObjectAwareInterface;

class AuthService
{
    public function __construct(protected AuthRepositoryInterface $repository) 
    {
    }

    public function create(DataTransferObjectAwareInterface $dataTransferObject)
    {
        $data = $dataTransferObject->toStoreArray();
        
        return $this->repository->create($data);
    }

    public function attempt(array $credentials) {
        return auth()->attempt($credentials);
    }

}