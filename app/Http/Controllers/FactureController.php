<?php

namespace App\Http\Controllers;

use App\Models\facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(facture::with(['gestionnaire','lignefactures.produit','lignecartes.clientcarte'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "remise" => 'sometimes|numeric|decimal:4,2',
            "tel" => 'sometimes|string|max:15',
            "typeFac" => 'required|integer|max:32767',
            "idCaissiere" => 'required|integer|exists:gestionnaire,idGest',
            "capital" => 'required|numeric|decimal:10,2',
            "tva" => 'required|numeric|decimal:10,2',
            "codePromo" => 'sometimes|string|max:15',
        ]);

        return response()->json(facture::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idFac)
    {
        return response()->json(facture::with(['gestionnaire','lignefactures.produit','lignecartes.clientcarte'])->findOrFail($idFac));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idFac, Request $request)
    {
        $facture = facture::findOrFail($idFac);
        $fields = $request->validate([
            "remise" => 'sometimes|numeric|decimal:4,2',
            "tel" => 'sometimes|string|max:15',
            "typeFac" => 'sometimes|integer|max:32767',
            "idCaissiere" => 'sometimes|integer|exists:gestionnaire,idGest',
            "capital" => 'sometimes|numeric|decimal:10,2',
            "tva" => 'sometimes|numeric|decimal:10,2',
            "codePromo" => 'sometimes|string|max:15',
        ]);
        $facture ->update($fields);

        return response()->json(facture::with(['gestionnaire','lignefactures.produit','lignecartes.clientcarte'])->findOrFail($idFac));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idFac)
    {
        try {
            facture::destroy($idFac);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
