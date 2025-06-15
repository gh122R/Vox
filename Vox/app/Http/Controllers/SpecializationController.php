<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecializationRequest;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\SpecializationResource;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function index(SpecializationRequest $request)
    {
        return SpecializationResource::collection(Specialization::paginate(15));
    }

    public function store(SpecializationRequest $request)
    {
        return new SpecializationResource(Specialization::create($request->validated()));
    }

    public function show(Specialization $specialization)
    {
        return new SpecializationResource($specialization);
    }

    public function update(SpecializationRequest $request, Specialization $specialization)
    {
       $specialization->update($request->validated());
        return new SpecializationResource($specialization);
    }

    public function destroy(Specialization $specialization)
    {
        $specialization->delete();
        return response(null, 204);
    }
}
