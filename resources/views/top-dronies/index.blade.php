@extends('layouts.app')

@section('content')

    <div class="mx-auto text-green-300 md:w-1/2 mt-16 text-center p-4 md:p-8">
        <div class="mb-8 text-red-500">
            <h1 class="text-2xl">Top 50 Cleanest Dronies</h1>
            <small>The list is updated hourly.</small>
        </div>

        <table class="table w-full">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Winning Votes</th>
                    <th>Win %</th>
                    <th>Rarity Ranking</th>
                </tr>
            </thead>
            @php $rank = 1; @endphp
            @foreach($topDronies as $topDronie)
            <tr class="border-dotted border border-green-300 text-center">
                <td>
                    #{{ $rank }}
                </td>
                <td>
                    #{{ $topDronie->dronie->nft_id }}
                </td>
                <td>
                    <a href="{{ $topDronie->dronie->url}}" target="_blank">
                        <img src="{{ $topDronie->dronie->image }}" alt="Image of dronie #{{ $topDronie->dronie->nft_id }}" class="w-16 mx-auto">
                    </a>
                </td>
                <td>
                    {{ $topDronie->clean_score }} /
                    {{ $topDronie->total_votes }}
                </td>
                <td>
                    {{ $topDronie->win_percentage }}%
                </td>
                <td>
                    {{ $topDronie->dronie->rank }}
                </td>
            </tr>
            @php $rank++; @endphp
            @endforeach
        </table>
    </div>

@endsection