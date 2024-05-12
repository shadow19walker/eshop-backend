<?php

namespace App\Http\Controllers;

use App\Models\ligneCommande;
use Illuminate\Http\Request;

class LignecommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ligneCommande::with(['produit','commande'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request -> validate([
            "idCommande" => 'required|integer|exists:commande,idCommande',
            "codePro" => 'required|integer|exists:produit,codePro',
            "quantite" => 'required|integer',
            "taille" => 'required|string|max:30',
            "couleur" => 'required|string|max:30',
            "disponible" => 'required|integer|in:0,1',
        ]);

        return response()->json(ligneCommande::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idLigneCom)
    {
        return ligneCommande::with(['produit','commande'])->findOrFail($idLigneCom);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idLigneCom, Request $request)
    {
        $ligneCommande = ligneCommande::findOrFail($idLigneCom);

        $fields = $request -> validate([
            "idCommande" => 'required|integer|exists:commande,idCommande',
            "codePro" => 'required|integer|exists:produit,codePro',
            "quantite" => 'required|integer',
            "taille" => 'required|string|max:30',
            "couleur" => 'required|string|max:30',
            "disponible" => 'required|integer|in:0,1',
        ]);

        $ligneCommande -> update($fields);

        return $ligneCommande;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idLigneCom)
    {
        try {
            ligneCommande::destroy($idLigneCom);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
