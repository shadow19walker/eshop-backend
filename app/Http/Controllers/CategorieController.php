<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::with('produits.photos')->get();

        // Parcourir chaque catégorie et chaque produit
        foreach ($categories as $categorie) {
            foreach ($categorie->produits as $produit) {
                foreach ($produit->photos as $photo) {
                    // Générer le lien complet de la photo
                    $photo->lienPhoto = asset('photos_produits/' . $photo->lienPhoto);
                }
            }
        }

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "nomCat"=>'required|string|max:60'
        ]);

        return response()->json(categorie::create($fields),201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idCat)
    {
        $categorie = Categorie::with('produits.photos')->findOrFail($idCat);
        foreach ($categorie->produits as $produit) {
            foreach ($produit->photos as $photo) {
                // Générer le lien complet de la photo
                $photo->lienPhoto = asset('photos_produits/' . $photo->lienPhoto);
            }
        }
        return response()->json($categorie);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($idCat, Request $request)
    {
        $categorie = categorie::findOrFail($idCat);
        $fields = $request->validate([
            'nomCat' => 'sometimes|string|max:60'
        ]);

        return $categorie->update($fields);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idCat)
    {
        try {
            // Récupérer la catégorie avec ses produits et les photos associées
            $categorie = Categorie::with('produits.photos')->findOrFail($idCat);

            // Parcourir chaque produit de la catégorie
            foreach ($categorie->produits as $produit) {
                // Supprimer chaque photo associée au produit du stockage
                foreach ($produit->photos as $photo) {
                    File::delete(public_path('photos_produits/' . $photo->lienPhoto));
                    $photo->delete();
                }

                // Supprimer le produit lui-même
                $produit->delete();
            }

            // Supprimer la catégorie elle-même
            $categorie->delete();

            // Répondre avec succès
            return response()->json(['message' => 'Catégorie, produits et photos supprimés avec succès'], 204);
        } catch (\Exception $e) {
            // En cas d'erreur, répondre avec un code d'erreur
            return response()->json(['message' => 'Échec de la suppression de la catégorie, des produits ou des photos'], 400);
        }
    }
}
