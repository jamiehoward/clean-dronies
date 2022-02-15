<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('safj320jf9u2kjsdf09u23jsdf9mqoxlqofjg0', function() {
    $activeUsers = \App\Models\User::get()->filter(function($user) {
        return $user->votes()->count() > 0;
    });

    // Make a collection of votes grouped by active user id
    $voteCounts = $activeUsers->mapWithKeys(function($user) {
        return [$user->id => $user->votes()->count()];
    });

    // Chunk user votes into groups by day and hour of the day
    $votesByDayAndHour = $activeUsers->map(function($user) {
        return $user->votes()->get()->groupBy(function($vote) use ($user) {
            return $user->id . " + " . $vote->created_at->format('Y-m-d H:00');
        });
    });

    // Get the number of votes per hour
    $votesByHour = $votesByDayAndHour->flatMap(function($votes) {
        return $votes->map(function($votes) {
            return $votes->count();
        });
    });

    $data = [
        'total_voting_users' => $activeUsers->count(),
        'total_voting_users_with_multiple_sessions' => $activeUsers->filter(function($user) {
            return $user->votes()->count() > 1;
        })->count(),
        'total_votes' => \App\Models\Vote::count(),
        'average_votes_per_user' => $voteCounts->avg(),
        'average_votes_per_session' => $votesByHour->avg(),
    ];

    return response($data);
});

Route::get('/', function () {
    $data = [
        'totalVotes' => \App\Models\Vote::count()
    ];

    return view('voting', $data);
});

Route::resource('top-dronies', 'App\Http\Controllers\TopDronieController');
