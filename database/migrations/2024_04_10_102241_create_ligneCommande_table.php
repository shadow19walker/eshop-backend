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
        Schema::create('ligneCommande', function (Blueprint $table) {
            $table->integer("idLigneCom",true,true);
            $table->integer("idCommande",unsigned: true);
            $table->integer("codePro",unsigned: true);
            $table->integer("quantite",unsigned: true);
            $table->string("taille",30);
            $table->string("couleur",30);
            $table->tinyInteger("disponible");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligneCommande');
    }
};
