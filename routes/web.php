<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('create-team', 'TestController@createTeam');
Route::get('all-team', 'TestController@allTeams');
Route::get('test', 'TestController@test');
Route::get('create-player', 'TestController@addPlayer');
Route::get('team-players', 'TestController@allTeamPlayers');
