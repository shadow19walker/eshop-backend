<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(fournisseur::with('achatfournisseurs')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "nom" => 'required|string|max:100',
            "adresse" => 'required|string|max:200',
            "ville" => 'required|string|max:50',
            "pays" => 'required|string|max:50',
            "mobile1" => 'sometimes|string|max:20',
            "mobile2" => 'sometimes|string|max:20',
            "type" => 'required|integer|in:0,1',
        ]);

        return response()->json(fournisseur::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idFour)
    {
        return fournisseur::with('achatfournisseurs')->findOrFail($idFour);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idFour, Request $request)
    {
        $fournisseur = fournisseur::findOrFail($idFour);
        $fields = $request->validate([
            "nom" => 'required|string|max:100',
            "adresse" => 'required|string|max:200',
            "ville" => 'required|string|max:50',
            "pays" => 'required|string|max:50',
            "mobile1" => 'sometimes|string|max:20',
            "mobile2" => 'sometimes|string|max:20',
            "type" => 'required|integer|in:0,1',
        ]);
        $fournisseur -> update($fields);

        return $fournisseur;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idFour)
    {
        try {
            $produit = fournisseur::findOrFail($idFour);
            $produit->delete();

            return response()->json(['message' => 'fournisseur deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Delete failed'], Response::HTTP_BAD_REQUEST);
        }
    }
}
