<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    // Récupérer les 4 jeux les plus récents
    $recentlyGames = Game::latest('released_at')->take(4)->get();

    // Passer les jeux à la vue
    return view('index', ['recentlyGames' => $recentlyGames]);
}
}
