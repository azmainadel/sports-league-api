<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Team;
use App\Player;

class TestController extends Controller
{
    public function createTeam(Request $request)
    {
      if ( ! $request->has('name')) {
        return 'error ! name required';
      }

      Team::create([
        'name' => $request->get('name'),
      ]);

      return Team::all();
    }

    public function allTeams(Request $request)
    {
      return Team::all();
    }

    public function test()
    {
      $now = Carbon::now();
      $then = Carbon::now()->subSeconds(2);
      return $then->diffForHumans($now);
    }

    public function addPlayer(Request $request)
    {
      $team = Team::find($request->get('team_id'));

      if ( ! is_null($team)) {
        $player = $team->players()->create([
          'name' => $request->get('name'),
          'type' => 1,
          'dob' => Carbon::today()->subYears(rand(20, 30)),
        ]);

        return $team->players()->orderBy('id', 'desc')->get();
      }

      return 'Team not found';
    }

    public function allTeamPlayers(Request $request)
    {
      $team = Team::find($request->get('team_id'));

      if ( ! is_null($team)) {
        return $team->players()->orderBy('dob', 'asc')->get();
      }

      return 'not found';
    }
}
