<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDronieRequest;
use App\Http\Requests\UpdateDronieRequest;
use App\Models\Dronie;

class DronieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDronieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDronieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dronie  $dronie
     * @return \Illuminate\Http\Response
     */
    public function show(Dronie $dronie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dronie  $dronie
     * @return \Illuminate\Http\Response
     */
    public function edit(Dronie $dronie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDronieRequest  $request
     * @param  \App\Models\Dronie  $dronie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDronieRequest $request, Dronie $dronie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dronie  $dronie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dronie $dronie)
    {
        //
    }
}
