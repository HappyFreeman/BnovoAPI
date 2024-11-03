<?php

namespace App\Contracts\Repositories;

use App\Models\Visitor;
use Illuminate\Support\Collection;

interface ApiVisitorRepositoryContract
{
    public function findAll(): Collection;

    public function getModel(): Visitor;

    public function getById(int $id, array $relations = []): Visitor;

    public function create(array $fields): Visitor;

    public function update(Visitor $visitor, array $fields): Visitor;

    public function delete(int $id): void;
}
