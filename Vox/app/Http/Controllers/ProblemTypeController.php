<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProblemTypeRequest;
use App\Http\Resources\ProblemTypeResource;
use App\Models\ProblemType;

class ProblemTypeController extends Controller
{
    public function index()
    {
        return ProblemTypeResource::collection(ProblemType::all());
    }

    public function store(ProblemTypeRequest $request)
    {
        $problemType = ProblemType::create($request->validated());
        return new ProblemTypeResource($problemType);
    }

    public function show(ProblemType $problemType)
    {
        return new ProblemTypeResource($problemType);
    }

    public function update(ProblemTypeRequest $request, ProblemType $problemType)
    {
        $problemType->update($request->validated());
        return new ProblemTypeResource($problemType);
    }

    public function destroy(ProblemType $problemType)
    {
        $name = $problemType->name;
        $problemType->delete();
        return response()->json(['message' => "Тип обращения $name удалён"]);
    }
}
