<?php

namespace App\Contracts\Services;
use App\Models\Visitor;

interface ApiVisitorUpdateServiceContract
{
    public function update(int $id, array $fields): Visitor;
}
