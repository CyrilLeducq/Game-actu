@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-10 mb-6">
        <h1 class="text-3xl">Nos Consoles</h1>
        <a href="/plateformes/creer" class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Ajouter une consôle</a>
    </div>

    <div class="grid grid-cols-3 gap-6">
        @foreach ($plateforms as $plateform)
            <div class="border p-4 rounded shadow">
                <h2>{{ $plateform->name }}</h2>
            </div>
        @endforeach
    </div>
@endsection