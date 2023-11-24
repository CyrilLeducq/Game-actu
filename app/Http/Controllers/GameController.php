<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Plateform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request as FacadesRequest;

class GameController extends Controller
{
    public function index()
    {
        return view('games/index', [
            // game::all() fonctionne mais moins optimisé
            'games' => Game::with('plateform')->get(),
        ]);
    }
    public function show($id)
    {
        $game = Game::findOrFail($id); // Select * from game where id = :id OU 404

        return view('games/show', ['game' => $game]);
    }

    public function create()
    {
        return view('games/create', [
            'plateforms' => Plateform::all()->sortBy('name'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'youtube' => 'nullable|string',
            'platform' => 'nullable|exists:plateforms,id',
            'synopsis' => 'required|min:10',
            'editor' => 'nullable|string',
            'developer'=> 'nullable|string',
            'gender' => 'nullable|string',
            'rating' => 'nullable|string',
            'mode' => 'nullable|string',
            'released_at' => 'nullable|date',
        ]);

        $game = new Game();
        $game->title = $request->title;
        $game->cover = 'https://resize-europe1.lanmedia.fr/img/var/europe1/storage/images/media/images/02-12-jaquette-jeux-video-gta-v/12188466-1-fre-FR/02.12-Jaquette-Jeux-Video-GTA-V_reference.jpg';
        $game->youtube = $request->youtube;
        $game->plateform_id = $request->plateform;
        $game->editor = $request->editor;
        $game->developer = $request->developer;
        $game->gender = $request->gender;
        $game->rating = $request->rating;
        $game->mode = $request->mode;
        $game->released_at = $request->released_at;
      
        $game->save();

        return redirect('/jeux');
    }

        public function edit($id)
        {
            $game = Game::findOrFail($id);
    
            Gate::allowIf($game->user_id == Auth::user()->id);
    
            return view('games/edit', [
                'plateforms' => Plateform::all()->sortBy('name'),
                'game'=> $game,
            ]);
        }
    
        public function update(Request $request, $id)
        {
            $game = Game::findOrFail($id); // On va modifier un jeu
            Gate::allowIf($game->user_id == Auth::user()->id);
    
            $request->validate([
                'title' => 'required|min:2',
                // 'cover' => '',
                'youtube' => 'nullable|string',
                'plateform' => 'nullable|exists:plateforms,id',
                'synopsis' => 'required|min:10',
                'editor' => 'nullable|min:10',
                'developer' => 'nullable|min:10',
                'gender' => 'nullable|min:3',
                'rating' => 'nullable|min:1',
                'mode' => 'nullable|min:1',
                'released_at' => 'nullable|date',
              
            ]);
            $game->title = $request->title;
            $game->youtube = $request->youtube;
            $game->plateform = $request->plateform;
            $game->synopsis = $request->synopsis;
            $game->editor = $request->eidtor;
            $game->developer = $request->developer;
            $game->gender = $request->gender;
            $game->rating = $request->rating;
            $game->mode = $request->mode;
            $game->released_at = $request->released_at;
                              
            $game->save();
    
            return redirect('/jeux');
        }

        public function destroy($id)
        {
            $game = Game::findOrFail($id); // On va supprimer un jeu
            Gate::allowIf($game->user_id == Auth::user()->id);// si il appartient  a lutilisateur connecté
    
            Game::destroy($id);
    
            return redirect('/jeux');
        }
    }