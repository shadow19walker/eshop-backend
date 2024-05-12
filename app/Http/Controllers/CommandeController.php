<?php

namespace App\Http\Controllers;

use App\Models\commande;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        try {
            $commandes = Commande::with(['ville', 'lignecommandes'])->get();
            return response()->json($commandes, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch data'], Response::HTTP_BAD_REQUEST);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "montant" => 'required|numeric|decimal:8,2',
            "nomClient" => 'required|string|max:60',
            "mobile" => 'required|string|max:20',
            "adresse" => 'required|string',
            "commentaire" => 'sometimes|string',
            "livrer" => 'sometimes|integer|in:0,1',
            "avance" => 'sometimes|numeric|decimal:8,2',
            "remise" => 'sometimes|numeric|decimal:8,2',
            "type" => 'required|numeric|in:0,1',
            "idVille" => 'required|exists:ville,idVille',
        ]);

        try {
            $new_commande = commande::create($fields);
            return response()->json(data:$new_commande, status: Response::HTTP_CREATED);
        }catch (\Exception $e) {
            return response()->json(data:['message' => 'Your data was not created'], status: Response::HTTP_BAD_REQUEST);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($idCommande)
    {
        return response()->json(commande::with(['lignecommandes','ville'])->findOrFail($idCommande));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idCommande, Request $request)
    {
        $fields = $request->validate([
            "montant" => 'sometimes|numeric|decimal:8,2',
            "nomClient" => 'sometime|string|max:60',
            "mobile" => 'sometimes|string|max:20',
            "adresse" => 'sometimes|string',
            "commentaire" => 'sometimes|string',
            "livrer" => 'sometimes|integer|in:0,1',
            "avance" => 'sometimes|numeric|decimal:8,2',
            "remise" => 'sometimes|numeric|decimal:2,2',
            "type" => 'sometimes|numeric|in:0,1',
            "idVille" => 'sometimes|exists:ville,idVille',
        ]);

        $commande = commande::findOrFail($idCommande);
        $commande->update(array($fields));
        try {
            return response()->json($commande, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Update failed'], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idCommande)
    {
        try {
            $commande = Commande::findOrFail($idCommande);
            $commande->delete();

            return response()->json(['message' => 'Command deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Delete failed'], Response::HTTP_BAD_REQUEST);
        }
    }
}
