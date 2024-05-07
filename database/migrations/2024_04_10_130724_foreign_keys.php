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
                ->onDelete('cascade')
                ->onUpdate("cascade");

            $table
                ->foreign("idCarte")
                ->references("matr")->on("clientCarte")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("gestionStock",function (Blueprint $table){
            $table
                ->foreign("idGest")
                ->references("idGest")->on("gestionnaire")
                ->onDelete('cascade')
                ->onUpdate("cascade");

            $table
                ->foreign("codePro")
                ->references("codePro")->on("produit")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("clientCarte",function (Blueprint $table){
            $table
                ->foreign("idVille")
                ->references("idVille")->on("ville")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("ligneCarte",function (Blueprint $table){
            $table
                ->foreign("idFac")
                ->references("idFac")->on("facture")
                ->onDelete('cascade')
                ->onUpdate("cascade");

            $table
                ->foreign("idCarte")
                ->references("matr")->on("clientCarte")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("facture",function (Blueprint $table){
            $table
                ->foreign("idCaissiere")
                ->references("idGest")->on("gestionnaire")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });
        Schema::table("ligneFacture",function (Blueprint $table){
            $table
                ->foreign("codePro")
                ->references("codePro")->on("produit")
                ->onDelete('cascade')
                ->onUpdate("cascade");

            $table
                ->foreign("idFac")
                ->references("idFac")->on("facture")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("commande",function (Blueprint $table){
            $table
                ->foreign("idVille")
                ->references("idVille")->on("ville")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("ligneCommande",function (Blueprint $table){
            $table
                ->foreign("idCommande")
                ->references("idCommande")->on("commande")
                ->onDelete('cascade')
                ->onUpdate("cascade");

            $table
                ->foreign("codePro")
                ->references("codePro")->on("produit")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("produit", function (Blueprint $table){
            $table
                ->foreign("idCategorie")
                ->references("idCat")->on("categorie")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("photo", function (Blueprint $table){
            $table
                ->foreign("codePro")
                ->references("codePro")->on("produit")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("achatFournisseur", function (Blueprint $table){
            $table
                ->foreign("idFour")
                ->references("idFour")->on("fournisseur")
                ->onDelete('cascade')
                ->onUpdate("cascade");
        });

        Schema::table("paieInfluenceur", function (Blueprint $table){
            $table
                ->foreign("idInf")
                ->references("idInf")->on("influenceur")
                ->onDelete('cascade')
                ->onUpdate("cascade");
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
