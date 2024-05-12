<?php

namespace App\Http\Controllers;

use App\Models\influenceur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InfluenceurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return influenceur::with('paieinfluenceurs')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "nom" => 'required|string|max:50',
            "mobile" => 'required|string|max:20',
            "codePromo" => 'required|string|max:20',
            "actif" => 'required|integer|in:0,1',
            "montant" => 'required|numeric|decimal:10,2',
            "pwd" => 'required|string|max:30',
        ]);

        $fields['pwd'] = Hash::make($request->input('pwd'));

        return response()->json(influenceur::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idInf)
    {
        return influenceur::with('paieinfluenceurs')->findOrFail($idInf);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idInf, Request $request)
    {
        $influenceur = influenceur::findOrFail($idInf);
        $fields = $request->validate([
            "nom" => 'required|string|max:50',
            "mobile" => 'required|string|max:20',
            "codePromo" => 'required|string|max:20',
            "actif" => 'required|integer|in:0,1',
            "montant" => 'required|numeric|decimal:10,2',
            "pwd" => 'required|string|max:30',
        ]);

        if(isset($fields['pwd'])){
            $fields['pwd'] = Hash::make($request->input('pwd'));
        } else{
            $fields['pwd'] =  $influenceur -> pwd;
        }
        $influenceur->update($fields);

        return $influenceur;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idInf)
    {
        try {
            influenceur::destroy($idInf);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
