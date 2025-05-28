<?php

namespace App\Http\Controllers;

use App\Models\ProblemType;
use Illuminate\Http\Request;

class ProblemTypeController extends Controller
{
    public function index()
    {
        $problemTypes = ProblemType::all();
        return view('problemTypes.index', compact('problemTypes'));
    }

    public function create()
    {
        return view('problemTypes.create');
    }

    public function store(Request $request)
    {
        $problem = ProblemType::create($request->validate([
            'name' => ['required', 'string', 'max:155'],
        ]));

        return redirect('/problem-type/' . $problem->id);
    }

    public function show(ProblemType $problem)
    {
        return view('problemTypes.show', compact('problem'));
    }

    public function edit(ProblemType $problemTypes)
    {
        return view('problemTypes.edit', compact('problemTypes'));
    }

    public function update(Request $request, ProblemType $problem)
    {
        $problem->update($request->validate([
            'name' => ['required', 'string', 'max:155'],
        ]));
        return redirect('/problem-type/' . $problem->id);
    }

    public function destroy(ProblemType $problem)
    {
        $problem->delete();
        return redirect('/problem-types');
    }
}
