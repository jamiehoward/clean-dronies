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

Route::get('safj320jf9u2kjsdf09u23jsdf9mqoxlqofjg0', 'App\Http\Controllers\StatsController@index');

Route::get('/', function () {
    $data = [
        'totalVotes' => \App\Models\Vote::count(),
        'faqs' => [
            "What's this site all about?" => "Clean Dronies is a community-sourced rarity tool. Many in the Dronies community felt that the less-cluttered NFTs were actually more desirable than the rarer ones. Since this is a subjective trait, we decided to make a tool to help you identify these rare birds.",
            "What's a dronie?" => "Dronies is <span class='font-bold'>the top Solana-based NFT collection</span>. You can read more about the project here: <a href='https://droniesnft.com' target='_blank' class='text-green-400 hover:text-green-600'>DroniesNFT.com</a>",
            "How do I submit my dronie for voting?" => "The entire NFT collection is here, so your dronie is already included. Get to voting!",
            "Why don't I see my dronie in the list?" => "It could be for two main reasons: 1) your dronie hasn't been voted on enough (remember, there are 10k of them!), or 2) your dronie isn't, ahem, one of the cleanest.",
            "Is this an official Dronies site?" => "Nope. I'm just some random guy who owns a bunch of dronies and thinks the project is going to the moon.",
            "I'm addicted to voting on clean dronies. Help!" => "Hey, we all are. If you want to complain about it, tweet <a href='https://twitter.com/intent/follow?screen_name=JamieHoward' target='_blank' class='text-red-500'>@JamieHoward</a>.",
        ]
    ];

    return view('voting', $data);
});

Route::resource('top-dronies', 'App\Http\Controllers\TopDronieController');
