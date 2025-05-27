<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;


class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        return view('complaint.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        Complaint::create($request->validate([
            'description' => ['required', 'string', 'max:255'],
            'anonymous'   => ['boolean'],
            'attachments' => ['array'],
        ]));
        return redirect('/myComplaints');
    }

    public function show(Complaint $complaint)
    {
        return view('complaints.show', compact('complaint'));
    }

    public function edit(Complaint $complaint)
    {
        return view('complaints.edit', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $complaint->update($request->validate([
            'description' => ['required', 'string', 'max:255'],
            'anonymous'   => ['boolean'],
            'attachments' => ['array'],
        ]));
        return redirect('/complaint/' . $complaint->id);
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect('/myComplaints');
    }
}
