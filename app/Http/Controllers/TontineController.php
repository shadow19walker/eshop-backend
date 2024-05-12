<?php

namespace App\Http\Controllers;

use App\Models\tontine;
use Illuminate\Http\Request;

class TontineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return tontine::with(['clientcarte','gestionnaire'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "montant"=>'required|decimal:10,2',
            "commentaire"=>'sometimes|string',
            "idGest"=>'required|integer|exists:gestionnaire,idGest',
            "validite" => 'required|integer|in:0,1',
            "idCarte" => 'required|integer|exists:clientCarte,matr',
            "action"=>'required|integer|in:0,1'
        ]);

        return response()->json(tontine::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $idTontine)
    {
        return response()->json(tontine::with(['clientcarte','gestionnaire'])->findOrFail($idTontine));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idTontine, Request $request)
    {
        $tontine = tontine::findOrFail($idTontine);
        $fields = $request->validate([
            "montant"=>'sometimes|decimal:10,2',
            "commentaire"=>'sometimes|string',
            "idGest"=>'sometimes|integer|exists:gestionnaire,idGest',
            "validite" => 'sometimes|integer|in:0,1',
            "idCarte" => 'sometimes|integer|exists:clientCarte,matr',
            "action"=>'sometimes|integer|in:0,1'
        ]);
        $tontine -> update($fields);
        return $tontine;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idTontine)
    {
        try {
            tontine::destroy($idTontine);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
