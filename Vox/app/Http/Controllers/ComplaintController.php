<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::where('user_id', Auth::id())->get();
        return view('complaint.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaint.create');
    }

    public function store(Request $request)
    {
        Complaint::create($request->validate([
            'description' => ['required', 'string', 'max:255'],
            'anonymous'   => ['boolean'],
            'attachments' => ['array'],
        ]));
        return redirect()->route('user.complaint');
    }

    public function show(Complaint $complaint)
    {
        return view('complaint.show', compact('complaint'));
    }

    public function edit(Complaint $complaint)
    {
        return view('complaint.edit', compact('complaint'));
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
