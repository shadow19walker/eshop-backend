<?php

namespace App\Http\Controllers;

use App\Models\expedition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpeditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(expedition::with('ville')->get(),Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "idVille" => 'integer|exists:ville,idVille',
            "transporteur" => 'required|string|max:250',
            "prix" => 'required|integer|decimal:8,2',
            "mobile1" => 'sometimes|string|max:15',
            "mobile2" => 'sometimes|string|max:15',
        ]);

        $expedition = expedition::create($fields);

        return response()->json(expedition::with('ville')->find($expedition->idExp),Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($idExp)
    {
        return response()->json(expedition::with('ville')->findOrFail($idExp),Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idExp, Request $request)
    {
        $expedition =  expedition::findOrFail($idExp);
        $fields = $request->validate([
            "idVille" => 'integer|exists:ville,idVille',
            "transporteur" => 'required|string|max:250',
            "prix" => 'required|integer|decimal:8,2',
            "mobile1" => 'sometimes|string|max:15',
            "mobile2" => 'sometimes|string|max:15',
        ]);
        $expedition->update($fields);
        return $expedition;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idExp)
    {
        try {
            expedition::destroy($idExp);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
