@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-10 mb-6">
        <h1 class="text-3xl">Jeux</h1>
        <a href="/jeux/creer" class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Créer un jeu</a>
    </div>

    <div  class="flex flex-wrap -mx-3 ">
        @foreach ($games as $game)
            <div class="w-1/2 md:w-1/3 lg:w-1/5">
                <div class="flex flex-col justify-between h-full">
                    <a href="/jeu/{{ $game->id }}" class ="block mx-3 group">
                        <img class="w-full h-[300px] object-cover mb-3" src="{{ $game->cover }}" alt="{{ $game->title }}">
                        <h3 class="text-sm text-gray-600 underline group-hover:no-underline">{{ $game->title }}</h3>
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
                    </a>
                    {{-- On affiche modifier /supprimer si on est connecté et qu'on a le film --}}
                    @if (Auth::user() && Auth::user()->id == $game->user_id)
                    <div class="mx-3 mb-3 flex justify-around">
                        <a class="bg-blue-400 text-white" href="/jeu/{{ $game->id }}/modifier">Modifier</a>
                        <a class="bg-red-500 text-white"href="/jeu/{{ $game->id }}/supprimer"onclick="return confirm('êtes-vous sûr de vouloir supprimer ce jeu  {{ $game->title }} ?')">Supprimer</a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
    </div>

@endsection
