<?php

namespace App\Http\Controllers;

use App\Models\clientCarte;
use Illuminate\Http\Request;

class ClientcarteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response() -> json(clientCarte::with(['tontines','lignecartes','ville'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "nom" => 'required|string|max:80',
            "sexe" => 'required|in:m,f',
            "dateNaiss" => 'required|date|before_or_equal:today',
            "idVille" => 'required|integer|exists:ville,idVille',
            "mobile" => 'required|string|max:15',
            "whatsapp" => 'required|in:0,1',
            "point" => 'required|numeric|min:0',
            "montantTontine" => 'sometimes|numeric|decimal:8,2',
        ]);

        return response()->json(clientCarte::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($matr)
    {
        return response()->json(clientCarte::with(['tontines','lignecartes','ville'])->findOrFail($matr));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($matr, Request $request)
    {

        $clientcarte = clientCarte::findOrFail($matr);

        $fields = $request->validate([
            "nom" => 'sometimes|string|max:80',
            "sexe" => 'sometimes|in:m,f',
            "dateNaiss" => 'sometimes|date|before_or_equal:today',
            "idVille" => 'sometimes|integer|exists:ville,idVille',
            "mobile" => 'sometimes|string|max:15',
            "whatsapp" => 'sometimes|in:0,1',
            "point" => 'sometimes|numeric|min:0',
            "montantTontine" => 'sometimes|numeric|decimal:8,2',
        ]);

        return response() -> json($clientcarte -> update($fields));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($matr)
    {
        return response() -> json((clientCarte::findOrFail($matr))->delete(),204);
    }
}
