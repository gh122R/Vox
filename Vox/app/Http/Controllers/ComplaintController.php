<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ComplaintController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->can('viewAll', Complaint::class))
        {
             return ComplaintResource::collection(Complaint::paginate(15));
        }
        else
        {
            return ComplaintResource::collection(Complaint::where('user_id', $user->id)->paginate(15));
        }
    }
    public function store(Request $request)
    {
        Complaint::create($request->validate([
            'description' => ['required', 'string', 'max:255'],
            'anonymous'   => ['boolean'],
            'attachments' => ['array'],
        ]));
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
