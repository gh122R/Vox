<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
         return StatusResource::collection(Status::all());
    }

    public function store(Request $request)
    {
        $status = Status::create($request->validate([
            'name' => ['required', 'string', 'max:55'],
        ]));
        return new StatusResource($status);
    }

    public function update(Request $request, Status $status)
    {
         $status->update($request->validate([
            'name' => ['required', 'string', 'max:55'],
        ]));
        return new StatusResource($status);
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return response()->json(['message' => 'Статус успешно удалён']);
    }
}
