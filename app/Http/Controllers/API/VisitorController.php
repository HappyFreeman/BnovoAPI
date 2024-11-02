<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Visitor\CreateVisitorRequest;
use App\Http\Requests\Api\Visitor\UpdateVisitorRequest;
use App\Http\Resources\API\Visitor\VisitorResource;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = Visitor::all();

        return VisitorResource::collection($visitors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateVisitorRequest $request)
    {
        $visitor = Visitor::create($request->validated());
        
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
    public function update(UpdateVisitorRequest $request, Visitor $visitor)
    {
        $visitor->update($request->validated());
        
        //$visitor = $visitor->fresh();

        return VisitorResource::make($visitor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();

        return response()->json([
            'message' => 'done',
        ]);
    }
}
