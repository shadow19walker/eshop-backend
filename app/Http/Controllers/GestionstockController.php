<?php

namespace App\Http\Controllers;

use App\Models\gestionStock;
use Illuminate\Http\Request;

class GestionstockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return gestionStock::with(['gestionnaire','produit'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request -> validate([
            "qte" => 'required|integer',
            "operation" => 'required|integer|in:0,1',
            "idGest" => 'required|integer|exists:gestionnaire,idGest',
            "codePro" => 'required|integer|exists:produit,codePro',
        ]);

        return response()->json(gestionStock::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idStock)
    {
        return gestionStock::with(['gestionnaire','produit'])->findOrFail($idStock);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idStock, Request $request)
    {
        $stock = gestionStock::findOrFail($idStock);
        $fields = $request -> validate([
            "qte" => 'sometimes|integer',
            "operation" => 'sometimes|integer|in:0,1',
            "idGest" => 'sometimes|integer|exists:gestionnaire,idGest',
            "codePro" => 'sometimes|integer|exists:produit,codePro',
        ]);

        $stock -> update($fields);

        return $stock;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idStock)
    {
        try {
            gestionStock::destroy($idStock);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
