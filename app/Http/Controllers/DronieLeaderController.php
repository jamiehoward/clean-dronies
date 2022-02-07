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

        // votes grouped by winner_id
        $votes = \App\Models\Vote::groupBy('winner_id')
            ->selectRaw('winner_id, count(*) as count')
            ->orderBy('count', 'desc')
            ->get()
            ->take(3)
            ->pluck('winner_id');

        $leaders = Dronie::whereIn('id', $votes)
            ->get();

        return response($leaders);
    }
}
