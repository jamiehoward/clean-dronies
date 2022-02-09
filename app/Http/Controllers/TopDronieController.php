<?php

namespace App\Http\Controllers;

use App\Models\Dronie;
use App\Models\TopDronie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TopDronieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the top 50 dronies with the highest number of winning votes

        // Cache the response so it's quicker to load
        $topDronies = Cache::remember('topDronies', now()->addMinutes(15), function () {
            return TopDronie::with('dronie')
            ->get()
            ->sortByDesc('clean_score')
            ->reject(function ($topDronie) {
                return $topDronie->dronie->elite_prototype != 'None';
            })
            ->take(50);
        });

        return view('top-dronies.index', compact('topDronies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopDronie  $topDronie
     * @return \Illuminate\Http\Response
     */
    public function show(TopDronie $topDronie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopDronie  $topDronie
     * @return \Illuminate\Http\Response
     */
    public function edit(TopDronie $topDronie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopDronie  $topDronie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopDronie $topDronie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopDronie  $topDronie
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopDronie $topDronie)
    {
        //
    }
}
