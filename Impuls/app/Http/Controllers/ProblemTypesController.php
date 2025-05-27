<?php

namespace App\Http\Controllers;

use App\Models\ProblemTypes;
use Illuminate\Http\Request;

class ProblemTypesController extends Controller
{
    public function index()
    {
        $problemTypes = ProblemTypes::all();
        return view('problemTypes.index', compact('problemTypes'));
    }

    public function create()
    {
        return view('problemTypes.create');
    }

    public function store(Request $request)
    {
        $problem = ProblemTypes::create($request->validate([
            'name' => ['required', 'string', 'max:155'],
        ]));

        return redirect('/problem-type/' . $problem->id);
    }

    public function show(ProblemTypes $problem)
    {
        return view('problemTypes.show', compact('problem'));
    }

    public function edit(ProblemTypes $problemTypes)
    {
        return view('problemTypes.edit', compact('problemTypes'));
    }

    public function update(Request $request, ProblemTypes $problem)
    {
        $problem->update($request->validate([
            'name' => ['required', 'string', 'max:155'],
        ]));
        return redirect('/problem-type/' . $problem->id);
    }

    public function destroy(ProblemTypes $problem)
    {
        $problem->delete();
        return redirect('/problem-types');
    }
}
