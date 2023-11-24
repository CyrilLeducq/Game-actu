<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plateform;
use Illuminate\Http\Request;

class PlateformController extends Controller
{
    public function index()
    {
        // return Category::all(); // SELECT * FROM categories

        return view('plateforms/index', [
            'plateforms' => Plateform::all(),
        ]);
    }

    public function create()
    {
        return view('plateforms/create');
    }

    // Code qui se fait quand on envoie le formulaire
    public function store(Request $request)
    {
        // Validation du champ name. Si aucune erreur, on va dans le save
        // S'il y a une erreur, Laravel renvoie vers le form avec les
        // erreurs
        $request->validate([
            'name' => 'required|min:3|unique:plateforms|max:25',
        ]);

        // Insertion en base de données
        $plateform = new Plateform();
        // $request->name est le contenu du input name
        $plateform->name = $request->name; // $_POST['name']
        $plateform->save(); // INSERT INTO categories en Laravel

        return redirect('/plateformes');
    }
}