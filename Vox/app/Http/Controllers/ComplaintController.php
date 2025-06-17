<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
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
    public function store(ComplaintRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        return new ComplaintResource(Complaint::create($data));
    }

    public function show(Complaint $complaint)
    {
        return new ComplaintResource($complaint);
    }

    public function update(ComplaintRequest $request, Complaint $complaint)
    {
        $complaint->update($request->validated());
        return new ComplaintResource($complaint);
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return response()->json(null, 204);
    }
}
