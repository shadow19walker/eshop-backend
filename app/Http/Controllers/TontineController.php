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
        return tontine::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tontine = $request->validate([
            "dateCotisation"=>'required|date',
            "montant"=>'required|decimal',
            "commentaire"=>'text',
            "idGest"=>'required|integer',
            "validite" => 'required|integer',
            "idCarte" => 'required|integer',
            "action"=>'required|integer'
        ]);

        return tontine::create($tontine);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $idTontine)
    {
        return response()->json(tontine::find($idTontine))
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idTontine, Request $request)
    {
        $fields = $request->validate([
            "dateCotisation"=>'required|date',
            "montant"=>'required|decimal',
            "commentaire"=>'text',
            "idGest"=>'required|integer',
            "validite" => 'required|integer',
            "idCarte" => 'required|integer',
            "action"=>'required|integer'
        ]);
        $tontine = tontine::find($idTontine);
        return $tontine->update
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tontine $tontine)
    {
        //
    }
}
