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
        //recuperer toutes les infos relatives a l'achats d'un fournisseur

        return achatFournisseur::with('fournisseur')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "lienFac" => 'required|string',
            "montantFac" => 'required|numeric|between:0,9999999999.99',
            "montantCargo" => 'required|numeric|between:0,9999999999.99',
            "totalKg" => 'required|numeric|between:0,99999999.99',
            "montantGlobal" => 'required|numeric|between:0,9999999999.99',
            "idFour" => 'required|integer',
            "idCargo" => 'required|integer',
        ]);

        return achatFournisseur::create($fields);
    }

    /**
     * Display the specified resource.
     */
    public function show($idAchat)
    {
        return response()->json(achatFournisseur::where('idAchat', $idAchat)->with('fournisseur')->firsOrFail());
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
            "lienFac" => 'sometimes|string',
            "montantFac" => 'sometimes|numeric|between:0,9999999999.99',
            "montantCargo" => 'sometimes|numeric|between:0,9999999999.99',
            "totalKg" => 'sometimes|numeric|between:0,99999999.99',
            "montantGlobal" => 'sometimes|numeric|between:0,9999999999.99',
            "idFour" => 'sometimes|integer',
            "idCargo" => 'sometimes|integer',
        ]);

        // Mettre à jour les champs si les données sont définies dans la requête
        $achatFournisseur->update($fields);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idAchat)
    {
        return((achatFournisseur::findOrFail($idAchat))->delete());
    }
}
