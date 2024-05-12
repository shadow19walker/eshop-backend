<?php

namespace App\Http\Controllers;

use App\Models\achatFournisseur;
use Illuminate\Http\Request;

class AchatfournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Récupérer tous les achats fournisseurs avec la relation fournisseur
        $achats = AchatFournisseur::with('fournisseur')->get();

        // Retourner une réponse JSON avec les achats fournisseurs et le code de statut approprié
       // return response()->json($achats);

        return response()->json($achats);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "lienFac" => 'required|string|max:250',
            "montantFac" => 'required|numeric|decimal:10,2',
            "montantCargo" => 'required|numeric|decimal:10,2',
            "totalKg" => 'required|numeric|decimal:8,2',
            "montantGlobal" => 'required|numeric|decimal:10,2',
            "idFour" => 'required|integer|exists:fournisseur,idFour',
            "idCargo" => 'required|integer',
        ]);

        return response()->json(achatFournisseur::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idAchat)
    {
        return response()->json(AchatFournisseur::with('fournisseur')->findOrFail($idAchat));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idAchat)
    {
        // Récupérer l'achat fournisseur existant
        $achatFournisseur = achatFournisseur::findOrFail($idAchat);

        // Valider les champs de la requête
        $fields = $request->validate([
            "lienFac" => 'sometimes|string|max:250',
            "montantFac" => 'sometimes|numeric|decimal:10,2',
            "montantCargo" => 'sometimes|numeric|decimal:10,2',
            "totalKg" => 'sometimes|numeric|decimal:8,2',
            "montantGlobal" => 'sometimes|numeric|decimal:10,2',
            "idFour" => 'sometimes|integer|exists:fournisseur,idFour',
            "idCargo" => 'sometimes|integer',
        ]);

        // Mettre à jour les champs si les données sont définies dans la requête
        return $achatFournisseur->update(array($fields));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idAchat)
    {
        return response()->json((achatFournisseur::findOrFail($idAchat))->delete());
    }
}
