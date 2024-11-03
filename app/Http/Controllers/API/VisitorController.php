<?php

namespace App\Http\Controllers\API;

use App\Contracts\Repositories\ApiVisitorRepositoryContract;
use App\Contracts\Services\ApiVisitorCreationServiceContract;
use App\Contracts\Services\ApiVisitorRemoverServiceContract;
use App\Contracts\Services\ApiVisitorUpdateServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Visitor\CreateVisitorRequest;
use App\Http\Requests\Api\Visitor\UpdateVisitorRequest;
use App\Http\Resources\API\Visitor\VisitorResource;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function __construct(private readonly ApiVisitorRepositoryContract $apiVisitorRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = $this->apiVisitorRepository->findAll();

        return VisitorResource::collection($visitors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CreateVisitorRequest $request,
        ApiVisitorCreationServiceContract $apiVisitorCreationService
    ) {
        //$visitor = Visitor::create($request->validated());
        $visitor = $apiVisitorCreationService->create($request->validated());

        return VisitorResource::make($visitor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
        return VisitorResource::make($visitor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateVisitorRequest $request,
        Visitor $visitor,
        ApiVisitorUpdateServiceContract $apiVisitorUpdateService
    ) {
        $visitor->update($request->validated());
        
        //$visitor = $visitor->fresh();

        return VisitorResource::make($visitor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Visitor $visitor,
        ApiVisitorRemoverServiceContract $apiVisitorRemoverService
    ) {
        $visitor->delete();

        return response()->json([
            'message' => 'done',
        ]);
    }
}
