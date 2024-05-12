<?php

namespace App\Http\Controllers;

use App\Models\gestionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return gestionnaire::with(['factures','gestionstocks','tontines'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "nomGest" => 'required|string|max:45',
            "typeGest" => 'required|integer',
            "login" => 'required|string|max:20',
            "pwd" => 'required|string|max:20',
            "actif" => 'required|integer|in:0,1',
            "mobile" => 'required|string|max:20',
        ]);

        $fields['pwd'] = Hash::make($request->input('pwd'));

        return response()->json(gestionnaire::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idGest)
    {
        return gestionnaire::with(['factures','gestionstocks','tontines'])->findOrFail($idGest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idGest, Request $request)
    {
        $gestionnaire = gestionnaire::findOrFail($idGest);
        $fields = $request->validate([
            "nomGest" => 'sometimes|string|max:45',
            "typeGest" => 'sometimes|integer',
            "login" => 'sometimes|string|max:20',
            "pwd" => 'sometimes|string|max:20',
            "actif" => 'sometimes|integer|in:0,1',
            "mobile" => 'sometimes|string|max:20',
        ]);

        if(isset($fields['pwd'])) {
            $fields['pwd'] = Hash::make($request->input('pwd'));
        } else{
            $fields['pwd'] = $gestionnaire -> pwd;
        }


        $gestionnaire -> update($fields);
        return $gestionnaire;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idGest)
    {
        try {
            gestionnaire::destroy($idGest);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
