<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments =  Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $department=  Department::create(request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:departments'],
        ]));
        return redirect('/department/' . $department->id);
    }

    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $department->update(request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:departments']
        ]));
        return redirect('/department/' . $department->id);
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect('/departments');
    }
}
