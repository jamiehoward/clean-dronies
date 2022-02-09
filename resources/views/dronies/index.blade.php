@extends('layouts.app')

@section('content')
    <div class="mx-auto md:w-1/2 mt-16 text-center p-8 border-green-300 border-dotted border-2">
        <h1 class="font-bold text-lg mb-8 text-white uppercase">Which Dronie is cleaner?</h1>
        <dronie-voting-list></dronie-voting-list>
    </div>

    <dronie-leaderboard></dronie-leaderboard> 
@endsection