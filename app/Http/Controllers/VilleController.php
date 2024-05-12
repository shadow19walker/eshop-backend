<?php

namespace App\Http\Controllers;

use App\Models\ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ville::with(['commandes','clientCartes','expeditions'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "libelle" => 'required|string|max:250'
        ]);

        return response()->json(ville::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idVille)
    {
        return ville::with(['commandes','clientCartes','expeditions'])->findOrFail($idVille);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idVille, Request $request)
    {
        $ville = ville::findOrFail($idVille);
        $fields = $request->validate([
            "libelle" => 'required|string|max:250'
        ]);
        $ville -> update($fields);
        return $ville;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idVille)
    {
        try {
            ville::destroy($idVille);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
