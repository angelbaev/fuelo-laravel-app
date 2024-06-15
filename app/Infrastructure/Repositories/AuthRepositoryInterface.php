<?php
namespace App\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Model;

interface AuthRepositoryInterface
{
    public function create(array $data): ?Model;
}