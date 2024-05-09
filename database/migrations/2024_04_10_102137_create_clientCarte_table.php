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
        Schema::create('clientCarte', function (Blueprint $table) {
            $table->integer("matr",true,true);
            $table->string("nom",80);
            $table->tinyInteger("sexe");
            $table->date("dateNaiss",10);
            $table->integer("idVille",unsigned: true);
            $table->string("mobile",15);
            $table->tinyInteger("whatsapp");
            $table->dateTime("creation");
            $table->integer("point",unsigned: true);
            $table->decimal("montantTontine");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientCarte');
    }
};
