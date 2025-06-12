<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    public function store(Request $request)
    {
        $role = Role::create($request->validate([
            'name' => ['required', 'string', 'max:70', 'unique:roles,name'],
        ]));
        return new RoleResource($role);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->validate([
            'name' => ['required', 'string', 'max:70', Rule::unique('roles', 'name')->ignore($role)],
        ]));
        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['message' => 'Роль успешно удалена.']);
    }
}
