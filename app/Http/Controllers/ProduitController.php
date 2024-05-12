<?php

namespace App\Http\Controllers;

use App\Models\photo;
use App\Models\produit;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
        $produits = produit::with(['categorie','photos'])->get();

        // Ajouter le nom de domaine aux liens des photos des produits
        foreach ($produits as $produit) {
            foreach ($produit->photos as $photo) {
                $photo->lienPhoto = asset('photos_produits/'.$photo->lienPhoto);
            }
        }

        return response()->json($produits, Response::HTTP_OK);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to fetch data'], Response::HTTP_BAD_REQUEST);
    }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "nomPro" => 'required|string|max:100',
            "prix" => 'required|integer|between:0,99999999',
            "qte" => 'required|integer',
            "description" => 'sometimes|string|max:100',
            "codeArrivage" => 'required|string|max:250',
            "actif" => 'required|integer|between:0,1',
            "idCategorie" => 'required|integer|exists:categorie,idCat',
            "prixAchat" => 'required|integer|between:0,99999999',
            "pourcentage" => 'required|numeric|between:0,100',
            "promo" => 'sometimes|integer|in:0,1',
            "size1" => 'required|integer',
            "size2" => 'required|integer',
            "typeSize" => 'required|integer',
            'photos' => 'required|array',
            'photos.*' => 'image|max:4096'
        ]);

        $produit = produit::create($fields);
        $i =1;
        foreach ($fields['photos'] as $photo){
            $photoName = date('d-m-Y-H-i-s').'_'.$produit->codePro."($i)".'.'.$photo->getClientOriginalExtension();
            $photo->move('photos_produits/',$photoName);
            $photos = photo::create([
                'lienPhoto' => $photoName,
                'codePro' => $produit->codePro
            ]);
            $i=$i+1;
        }

        return \response()->json(produit::with(['categorie','photos'])->find($produit->codePro),Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($codePro)
    {
        return response()->json(produit::with(['categorie','photos'])->findOrFail($codePro));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($codePro, Request $request)
    {
        $produit = produit::findOrFail($codePro);
        $fields = $request->validate([
            "nomPro" => 'sometimes|string|max:100',
            "prix" => 'sometimes|integer|between:0,99999999',
            "qte" => 'sometimes|integer',
            "description" => 'sometimes|string|max:100',
            "codeArrivage" => 'sometimes|string|max:250',
            "actif" => 'sometimes|integer|between:0,1',
            "idCategorie" => 'sometimes|integer|exists:categorie,idCat',
            "prixAchat" => 'sometimes|integer|between:0,99999999',
            "pourcentage" => 'sometimes|numeric|between:0,100',
            "promo" => 'sometimes|integer|in:0,1',
            "size1" => 'sometimes|integer',
            "size2" => 'sometimes|integer',
            "typeSize" => 'sometimes|integer',
            'photos' => 'sometimes|array',
            'photos.*' => 'image|max:4096'
        ]);

        $produit->update($fields);

        foreach ($fields['photos'] as $photo){
            if (!isset($photo->idPhoto)) {
                $photoName = date('d-m-Y-H-i-s') . '_' . $fields['codePro'] . '_' . $photo->getClientOriginalExtension();
                $photo->move('photos_produits/', $photoName);
                photo::create([
                    'lienPhoto' => $photoName,
                    'codePro' => $produit->codePro
                ]);
            }
        }

        return \response()->json(produit::with(['categorie','photos'])->find($produit->codePro), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($codePro)
    {
        try {
            // Récupérer le produit
            $produit = Produit::findOrFail($codePro);

            // Supprimer les photos associées au produit du stockage
            foreach ($produit->photos as $photo) {
                File::delete(public_path('photos_produits/'.$photo->lienPhoto));
                $photo->delete();
            }
            $produit->delete();

            return response()->json(['message' => 'Produit et photos supprimés avec succès'], 200);
        } catch (\Exception $e) {
            // En cas d'erreur, répondre avec un code d'erreur
            return response()->json(['message' => 'Échec de la suppression du produit ou des photos'], 400);
        }
    }
}
