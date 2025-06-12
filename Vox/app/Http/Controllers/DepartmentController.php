<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        return DepartmentResource::collection(Department::all());
    }

    public function store(DepartmentRequest $request)
    {
        $department = Department::create($request->validated());
        return new DepartmentResource($department);
    }

    public function show(Department $department)
    {
        return new DepartmentResource($department);
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());
        return new DepartmentResource($department);
    }

    public function destroy(Department $department)
    {
        $name = $department->name;
        $department->delete();
        return response()->json(['message' => "Отдел $name успешно удалён."]);
    }
}
