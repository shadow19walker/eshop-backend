<?php

namespace App\Http\Controllers;

use App\Models\ligneFacture;
use Illuminate\Http\Request;

class LignefactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ligneFacture::with(['facture','produit'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "idFac" => 'required|integer|exists:facture,idFac',
            "codePro" => 'required|integer|exists:produit,codePro',
            "prix" => 'required|numeric|decimal:10,2',
            "qte" => 'required|numeric',
        ]);

        return response()->json(ligneFacture::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idLFac)
    {
        return ligneFacture::with(['facture','produit'])->findOrFail($idLFac);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idLFac, Request $request)
    {
        $lignefacture = ligneFacture::findOrFail($idLFac);

        $fields = $request->validate([
            "idFac" => 'sometimes|integer|exists:facture,idFac',
            "codePro" => 'sometimes|integer|exists:produit,codePro',
            "prix" => 'sometimes|numeric|decimal:10,2',
            "qte" => 'sometimes|numeric',
        ]);

        $lignefacture -> update($fields);

        return $lignefacture;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idLFac)
    {
        try {
            ligneFacture::destroy($idLFac);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
