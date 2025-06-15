<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
         return StatusResource::collection(Status::all());
    }

    public function show(Status $status)
    {
        return new StatusResource($status);
    }

    public function store(StatusRequest $request)
    {
        $status = Status::create($request->validated());
        return new StatusResource($status);
    }

    public function update(StatusRequest $request, Status $status)
    {
         $status->update($request->validated());
        return new StatusResource($status);
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return response(null, 204);
    }
}
