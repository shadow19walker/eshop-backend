<?php

namespace App\Http\Controllers;

use App\Models\ligneCarte;
use Illuminate\Http\Request;

class LignecarteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ligneCarte::with(['clientcarte','facture'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request -> validate([
            "idFac" => 'required|integer|exists:facture,idFac',
            "idCarte" => 'required|integer|exists:clientcarte,matr',
            "point" => 'required|integer',
            "montantFac" => 'required|numeric|decimal:10,2',
        ]);

        return response()->json(ligneCarte::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ligneCarte::with(['facture','lignecarte'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $lignecarte = ligneCarte::findOrFail($id);

        $fields = $request -> validate([
            "idFac" => 'required|integer|exists:facture,idFac',
            "idCarte" => 'required|integer|exists:clientcarte,matr',
            "point" => 'required|integer',
            "montantFac" => 'required|numeric|decimal:10,2',
        ]);

        $lignecarte -> update($fields);

        return $lignecarte;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            ligneCarte::destroy($id);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
