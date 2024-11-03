<?php

namespace App\Repositories;

use App\Contracts\Repositories\ApiVisitorRepositoryContract;
use App\Models\Visitor;
use Illuminate\Support\Collection;

class ApiVisitorRepository implements ApiVisitorRepositoryContract
{
    public function __construct(private readonly Visitor $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function getById(int $id, array $relations = []): Visitor
    {
        return $this->getModel()
            ->when($relations, fn ($query) => $query->with($relations))
            ->findOrFail($id)
        ;
    }

    public function create(array $fields): Visitor
    {
        return $this->getModel()->create($fields);
    }

    public function update(Visitor $visitor, array $fields): Visitor
    {
        $visitor->update($fields);
        return $visitor;
    }

    public function delete(int $id): void
    {
        //$this->getById($id)->delete();
        $this->getModel()->where('id', $id)->delete(); // так лучше
    }

    public function getModel(): Visitor
    {
        return $this->model;
    }
}
