<?php

namespace App\Http\Controllers;

use App\Models\photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return photo::with('produit.categorie')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request -> validate([
            "photo" => 'image|max:4096',
            "codePro" => 'required|integer|exists:produit,codePro',
        ]);
        $photo = $fields['photo'];
        $photoName = date('d-m-Y-H-i-s').'_'.$fields['codePro'].'.'.$photo->getClientOriginalExtension();
        $photo->move('photos_produits/',$photoName);
        return response()->json(photo::create([
            'lienPhoto' => $photoName,
            'codePro' => $fields['codePro'],
        ]), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idPhoto)
    {
        $photo = photo::with('produit')->findOrFail($idPhoto);

        $photo['lienPhoto'] = asset('photos_produits/'.$photo['lienPhoto']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($idPhoto, Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idPhoto)
    {
        // Récupérer le chemin de la photo à partir de la base de données
        $photo = Photo::findOrFail($idPhoto);
        $cheminPhoto = $photo->lienPhoto;

        // Supprimer la photo de la base de données
        File::delete(public_path('photos_produits/'.$cheminPhoto));
        $photo->delete();

        // Répondre avec succès
        return response()->json(['message' => 'Photo deleted successfully'],204);
    }
}
