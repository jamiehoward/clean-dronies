<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('dronie-votes', 'App\Http\Controllers\DronieVoteController');
Route::resource('leaders', 'App\Http\Controllers\DronieLeaderController');

Route::get('votes/total', 'App\Http\Controllers\DronieVoteController@totalVotes');

Route::get('dronies/getByNftId/{nftId}', 'App\Http\Controllers\DronieController@getByNftId');
