<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXMLElement;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $activeUsers = \App\Models\User::get()->filter(function ($user) {
            return $user->votes()->count() > 0;
        });

        // Make a collection of votes grouped by active user id
        $voteCounts = $activeUsers->mapWithKeys(function ($user) {
            return [$user->id => $user->votes()->count()];
        });

        // Chunk user votes into groups by day and hour of the day
        $votesByDayAndHour = $activeUsers->map(function ($user) {
            return $user->votes()->get()->groupBy(function ($vote) use ($user) {
                return $user->id . " + " . $vote->created_at->format('Y-m-d H:00');
            });
        });

        // Get the number of votes per hour
        $votesByHour = $votesByDayAndHour->flatMap(function ($votes) {
            return $votes->map(function ($votes) {
                return $votes->count();
            });
        });

        $data = [
            'total_voting_users' => $activeUsers->count(),
            'total_voting_users_with_multiple_sessions' => $activeUsers->filter(function ($user) {
                return $user->votes()->count() > 1;
            })->count(),
            'total_votes' => \App\Models\Vote::count(),
            'average_votes_per_user' => $voteCounts->avg(),
            'average_votes_per_session' => $votesByHour->avg(),
        ];

        if (isset($request->json)) {
            return response()->json($data);
        } else { // Return XML
            $xml = new SimpleXMLElement('<data/>');
            array_walk_recursive($data, function ($value, $key) use ($xml) {
                $xml->addChild($key, $value);
            });
            return response($xml->asXML())->header('Content-Type', 'text/xml');
        }
    }
}
