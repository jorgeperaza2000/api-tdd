<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $items = Team::get();

        return response()->json(TeamResource::collection($items), 200);
    }

    public function getById(Team $team)
    {
        return response()->json(new TeamResource($team), 200);
    }

    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->only('name', 'slug_name'));

        return response()->json(new TeamResource($team), 201);
    }

    public function update(Team $team, UpdateTeamRequest $request)
    {
        $team->update($request->only('name', 'slug_name'));

        return response()->json(new TeamResource($team), 201);
    }

    public function delete(Team $team)
    {
        $team->delete();

        return response()->json([], 204);
    }
}
