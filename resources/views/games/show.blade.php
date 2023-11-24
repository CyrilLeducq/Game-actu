@extends('layouts.app')

@section('content')
<a href="/jeux" class="text-gray-500">Retour aux jeux</a>    
<div class="flex gap-10 items-center">
        <div class="w-2/5">
            <img class="w-full" src="{{ $game->cover }}" alt="{{ $game->title }}">
        </div>
        <div class="w-3/5">
            <div class="border p-4 shadow">
                <h1 class="text-3xl">{{ $game->title }}</h1>
                    <p class="text-sm mb-3">
                    @if ($game->released_at)
                    {{ $game->released_at->diffForHumans() }} |
                    {{ $game->released_at->translatedFormat('Y') }} |
                    @endif
                    @if ($game->plateform_id)
                    {{ $game->plateform->name }} |
                    @endif
                    {{ $game->editor }}|{{ $game->developer }}
                </p>
                <p class="my-3">{{ $game->synopsis }}</p>
            </div>
            
            @if($game->youtube)
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $game->youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @endif
        </div>  
    </div>
@endsection