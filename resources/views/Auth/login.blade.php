@extends('layouts.app')

@section('content')
<a href="/register" class="text-gray-500">Je n'ai pas de compte</a>
    <form action="" method="post">
        @csrf
        <input type="text"name="email">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <input type="password"name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <button>Connexion</button>
    </form>
@endsection