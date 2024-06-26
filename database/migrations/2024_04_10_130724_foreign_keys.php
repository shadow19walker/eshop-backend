<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("tontine",function (Blueprint $table){
            $table
                ->foreign("idGest")
                ->references("idGest")->on("gestionnaire")
                ->onUpdate("cascade");

            $table
                ->foreign("idCarte")
                ->references("matr")->on("clientCarte")
                ->onUpdate("cascade");
        });

        Schema::table("gestionStock",function (Blueprint $table){
            $table
                ->foreign("idGest")
                ->references("idGest")->on("gestionnaire")
                ->onUpdate("cascade");

            $table
                ->foreign("codePro")
                ->references("codePro")->on("produit")
                ->onUpdate("cascade");
        });

        Schema::table("clientCarte",function (Blueprint $table){
            $table
                ->foreign("idVille")
                ->references("idVille")->on("ville")
                ->onUpdate("cascade");
        });

        Schema::table("ligneCarte",function (Blueprint $table){
            $table
                ->foreign("idFac")
                ->references("idFac")->on("facture")
                ->onUpdate("cascade");

            $table
                ->foreign("idCarte")
                ->references("matr")->on("clientCarte")
                ->onUpdate("cascade");
        });

        Schema::table("facture",function (Blueprint $table){
            $table
                ->foreign("idCaissiere")
                ->references("idGest")->on("gestionnaire")
                ->onUpdate("cascade");
        });
        Schema::table("ligneFacture",function (Blueprint $table){
            $table
                ->foreign("codePro")
                ->references("codePro")->on("produit")
                ->onUpdate("cascade");

            $table
                ->foreign("idFac")
                ->references("idFac")->on("facture")
                ->onUpdate("cascade");
        });

        Schema::table("commande",function (Blueprint $table){
            $table
                ->foreign("idVille")
                ->references("idVille")->on("ville")
                ->onUpdate("cascade");
        });

        Schema::table("ligneCommande",function (Blueprint $table){
            $table
                ->foreign("idCommande")
                ->references("idCommande")->on("commande")
                ->onUpdate("cascade");

            $table
                ->foreign("codePro")
                ->references("codePro")->on("produit")
                ->onUpdate("cascade");
        });

        Schema::table("produit", function (Blueprint $table){
            $table
                ->foreign("idCategorie")
                ->references("idCat")->on("categorie")
                ->onUpdate("cascade")
                ->cascadeOnDelete();
        });

        Schema::table("photo", function (Blueprint $table){
            $table
                ->foreign("codePro")
                ->references("codePro")->on("produit")
                ->onUpdate("cascade")
                ->cascadeOnDelete();
        });

        Schema::table("achatFournisseur", function (Blueprint $table){
            $table
                ->foreign("idFour")
                ->references("idFour")->on("fournisseur")
                ->onUpdate("cascade");
        });

        Schema::table("paieInfluenceur", function (Blueprint $table){
            $table
                ->foreign("idInf")
                ->references("idInf")->on("influenceur")
                ->onUpdate("cascade");
        });

        Schema::table("expedition", function (Blueprint $table){
            $table
                ->foreign("idVille")
                ->references("idVille")->on("ville")
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
    }
};
