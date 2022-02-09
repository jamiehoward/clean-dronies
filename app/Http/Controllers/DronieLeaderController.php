<?php

namespace App\Http\Controllers;

use App\Models\Dronie;
use App\Models\TopDronie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DronieLeaderController extends Controller
{
    public function index()
    {
        // Sort by dronies with the highest number of winning votes

        // votes grouped by winner_id
        $leaders = Cache::remember('top_leaders', now()->addMinutes(15), function () {
            return TopDronie::with('dronie')
            ->orderBy('clean_score', 'desc')
            ->orderBy('win_percentage', 'desc')
            ->get()
            ->reject(function ($topDronie) {
                return $topDronie->dronie->elite_prototype != 'None';
            })
            ->take(3);
        });

        return response($leaders);
    }
}
