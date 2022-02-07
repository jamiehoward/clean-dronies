<?php

namespace App\Http\Controllers;

use App\Models\Dronie;
use Illuminate\Http\Request;

class DronieVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dronies = \App\Models\Dronie::where('attribute_count', '<', 9)
            ->where('elite_prototype', '=', 'None')
            ->get()
            ->shuffle()
            ->take(2);

        return response($dronies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $winner = \App\Models\Dronie::find($request->winner_id);
        $loser = \App\Models\Dronie::find($request->loser_id);

        if ($winner && $loser) {
            $vote = \App\Models\Vote::create([
                'winner_id' => $winner->id,
                'loser_id' => $loser->id,
                'attribute' => $request->attribute,
            ]);

            return response($vote);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
