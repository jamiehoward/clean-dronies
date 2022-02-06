<?php

namespace App\Http\Controllers;

use App\Models\Dronie;
use Illuminate\Http\Request;

class DronieLeaderController extends Controller
{
    public function index()
    {
        // Sort by dronies with the highest number of winning votes
        $leaders = \App\Models\Dronie::withCount('winningVotes')
            ->orderBy('winning_votes_count', 'desc')
            ->get()
            ->take(3);

        return response($leaders);
    }
}
