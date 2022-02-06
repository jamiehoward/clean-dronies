<?php

namespace App\Http\Controllers;

use App\Models\Dronie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DronieLeaderController extends Controller
{
    public function index()
    {
        // Sort by dronies with the highest number of winning votes

        $leaders = Cache::remember('leaderboard', 120, function() {
            return \App\Models\Dronie::withCount('winningVotes')
                ->orderBy('winning_votes_count', 'desc')
                ->get()
                ->take(3)
                ->reverse();
        });

        return response($leaders);
    }
}
