<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;

class TeamController extends Controller
{
    public function getById(Team $team)
    {
        return response()->json($team, 200);
    }

    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->only('name', 'slug_name'));

        return response()->json($team, 201);
    }

}
