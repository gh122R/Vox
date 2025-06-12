<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());
        return new RoleResource($role);
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $name = $role->name;
        $role->delete();
        return response()->json(['message' => "Роль $name успешно удалена."]);
    }
}
