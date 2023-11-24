@extends('layouts.app')

@section('content')
    <div  class="flex flex-wrap -mx-3 ">
        @foreach ($recentlyGames as $recentlyGame)
      
            <div class="w-1/2 md:w-1/3 lg:w-1/5">
                <div class="flex flex-col justify-between h-full">
                    <a href="/jeu/{{ $recentlyGame->id }}" class ="block mx-3 group">
                        <img class="w-full h-[300px] object-cover mb-3" src="{{ $recentlyGame->cover }}" alt="{{ $recentlyGame->title }}">
                        <h3 class="text-sm text-gray-600 underline group-hover:no-underline">{{ $recentlyGame->title }}</h3>
                        <p class="text-sm mb-3">
                            @if ($recentlyGame->released_at)
                            {{ $recentlyGame->released_at->diffForHumans() }} |
                            {{ $recentlyGame->released_at->translatedFormat('d F Y') }} |
                            @endif
                            @if ($recentlyGame->plateform_id)
                            {{ $recentlyGame->plateform->name }} |
                            @endif
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
    </div>

@endsection
