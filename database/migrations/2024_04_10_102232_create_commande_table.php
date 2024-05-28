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
        Schema::create('commande', function (Blueprint $table) {
            $table->timestamp("dateCom")->useCurrent();
            $table->integer("idCommande",true,true);
            $table->decimal("montant",unsigned: true);
            $table->string("nomClient",50);
            $table->string("mobile",20);
            $table->text("adresse");
            $table->text("commentaire");
            $table->tinyInteger("livrer",unsigned: true);
            $table->decimal("avance",8,2);
            $table->decimal("remise",2,2);
            $table->tinyInteger("type");
            $table->integer("idVille",unsigned: true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande');
    }
};
