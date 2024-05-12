<?php

namespace App\Http\Controllers;

use App\Models\messagerie;
use Illuminate\Http\Request;

class MessagerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return messagerie::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "mobile" => 'required|string|max:20',
            "wsms" => 'required|string',
            "type" => 'required|integer',
            "service" => 'required|integer',
        ]);

        return response()->json(messagerie::create($fields), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idmsg)
    {
        return messagerie::findOrFail($idmsg);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idmsg, Request $request)
    {
        $message = messagerie::findOrFail($idmsg);
        $fields = $request->validate([
            "mobile" => 'sometimes|string|max:20',
            "wsms" => 'sometimes|string',
            "type" => 'sometimes|integer',
            "service" => 'sometimes|integer',
        ]);
        $message -> update($fields);
        return $message;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idmsg)
    {
        try {
            messagerie::destroy($idmsg);

            return \response()->json(null,204);
        }catch (\Exception $e) {
            // En cas d'erreur, renvoyer un code de statut 400 Bad Request avec un message d'erreur
            return response()->json(['message' => 'Failed to delete resource'], 400);
        }
    }
}
