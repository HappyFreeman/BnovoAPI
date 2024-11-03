<?php

namespace App\Contracts\Services;
use App\Models\Visitor;

interface ApiVisitorCreationServiceContract
{
    public function create(array $fields): Visitor;
}
