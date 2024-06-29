<?php
namespace App\Infrastructure\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all(array $filters = [], int $perPage = 15): LengthAwarePaginator;

    public function create(array $data): Model;

    public function update(array $data, string $id): Model;

    public function delete(string $id);

    public function find(string $id): Model;
}