<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function getById(Team $team)
    {
        return response()->json($team, 200);
    }

}
