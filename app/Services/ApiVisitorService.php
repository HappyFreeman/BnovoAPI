<?php

namespace App\Services;

use App\Contracts\Repositories\ApiVisitorRepositoryContract;
use App\Contracts\Services\ApiVisitorCreationServiceContract;
use App\Contracts\Services\ApiVisitorRemoverServiceContract;
use App\Contracts\Services\ApiVisitorUpdateServiceContract;
use App\Models\Visitor;

class ApiVisitorService implements ApiVisitorCreationServiceContract, ApiVisitorRemoverServiceContract, ApiVisitorUpdateServiceContract
{
    public function __construct(
        private readonly ApiVisitorRepositoryContract $apiVisitorRepository
    ) {
    }

    public function create(array $fields): Visitor
    {
        $visitor = $this->apiVisitorRepository->create($fields);
        return $visitor;
    }

    public function update(int $id, array $fields): Visitor
    {
        $visitor = $this->apiVisitorRepository->getById($id);
        $this->apiVisitorRepository->update($visitor, $fields);
        return $visitor;
    }

    public function delete(int $id): void
    {
        $this->apiVisitorRepository->delete($id);
    }
}
