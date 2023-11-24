@extends('layouts.app')

@section('content')
    <a href="/jeux" class="text-gray-500">Retour aux jeux</a>
    <h1 class="text-3xl mb-3">Modifier</h1>

    @foreach ($errors->all() as $error)
        <p class="text-red-500">{{ $error }}</p>
    @endforeach

    <form action="" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="block">Titre</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="rounded shadow border-gray-300 w-full">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="plateform" class="block">Plateforme</label>
            <select name="platform" id="plateform" class="rounded shadow border-gray-300 w-full">
                @foreach ($plateforms as $plateform)
                    <option @selected($plateform->id == old('plateform')) value="{{ $plateform->id }}">{{ $plateform->name }}</option>
                @endforeach
            </select>
            @error('plateform')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="synopsis" class="block">Synopsis</label>
            <textarea name="synopsis" id="synopsis" class="rounded shadow border-gray-300 w-full">{{ old('synopsis') }}</textarea>
            @error('synopsis')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="editor" class="block">Editeur</label>
            <textarea name="editor" id="editor" class="rounded shadow border-gray-300 w-full">{{ old('editor') }}</textarea>
            @error('editor')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="developer" class="block">Développeur</label>
            <textarea name="developer" id="developer" class="rounded shadow border-gray-300 w-full">{{ old('developer') }}</textarea>
            @error('developer')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="block">Genre</label>
            <textarea name="gender" id="gender" class="rounded shadow border-gray-300 w-full">{{ old('gender') }}</textarea>
            @error('gender')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rating" class="block">Tranche d'âge</label>
            <textarea name="rating" id="rating" class="rounded shadow border-gray-300 w-full">{{ old('rating') }}</textarea>
            @error('rating')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mode" class="block">Mode de jeu</label>
            <textarea name="mode" id="mode" class="rounded shadow border-gray-300 w-full">{{ old('mode') }}</textarea>
            @error('mode')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="released_at" class="block">Date de sortie</label>
            <input type="date" name="released_at" id="released_at" value="{{ old('released_at') }}" class="rounded shadow border-gray-300 w-full">
            @error('released_at')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Modifier</button>
    </form>
@endsection
