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

Route::get('/', function () {
    $data = [
        'totalVotes' => \App\Models\Vote::count()
    ];

    return view('voting', $data);
});

Route::resource('top-dronies', 'App\Http\Controllers\TopDronieController');
