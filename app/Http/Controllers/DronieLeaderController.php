<?php

namespace App\Http\Controllers;

use App\Models\Dronie;
use Illuminate\Http\Request;

class DronieLeaderController extends Controller
{
    public function index()
    {
        $leaders =  Dronie::get()->sortByDesc('clean_score')->take(3);

        return response($leaders);
    }
}
