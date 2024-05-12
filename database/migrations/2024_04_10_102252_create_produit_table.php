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
        Schema::create('produit', function (Blueprint $table) {
            $table->integer("codePro",true,true);
            $table->string("nomPro",100);
            $table->decimal("prix",8,0);
            $table->integer("qte",unsigned: true);
            $table->string("description",100);
            $table->string("codeArrivage",250);
            $table->tinyInteger("actif");
            $table->integer("idCategorie",unsigned: true);
            $table->dateTime("dateInsertion")->default(now());
            $table->decimal("prixAchat",8,0);
            $table->decimal("pourcentage",2,2);
            $table->tinyInteger("promo");
            $table->integer("size1");
            $table->integer("size2");
            $table->integer("typeSize");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit');
    }
};
