<?php

namespace App\Http\Controllers;

use App\Models\paieInfluenceur;
use Illuminate\Http\Request;

class PaieinfluenceurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return paieInfluenceur::with('influenceur')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "montant" => 'required|numeric|decimal:10,2',
            "idInf" => 'required|integer|exists:influenceur,idInf',
            "validite" => 'required|integer|in:0,1',
            "commentaire" => 'sometimes|string',
        ]);

        return response()->json(paieInfluenceur::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idPaiement)
    {
        return paieInfluenceur::with('influenceur')->findOrFail($idPaiement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idPaiement, Request $request)
    {
        $paieinfluenceur = paieInfluenceur::findOrFail($idPaiement);

        $fields = $request->validate([
            "montant" => 'sometimes|numeric|decimal:10,2',
            "idInf" => 'sometimes|integer|exists:influenceur,idInf',
            "validite" => 'sometimes|integer|in:0,1',
            "commentaire" => 'sometimes|string',
        ]);

        $paieinfluenceur -> update($fields);

        return $paieinfluenceur;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idPaiement)
    {
        try {
            paieInfluenceur::destroy($idPaiement);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
