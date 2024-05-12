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
        Schema::create('achatFournisseur', function (Blueprint $table) {
            $table->integer("idAchat",true,true);
            $table->string("lienFac",250);
            $table->dateTime("dateInsertion")->default(now());
            $table->decimal("montantFac",10,2);
            $table->decimal("montantCargo",10,2);
            $table->decimal("totalKg",8,2);
            $table->decimal("montantGlobal",10,2);
            $table->integer("idFour",unsigned: true);
            $table->integer("idCargo",unsigned: true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achatFournisseur');
    }
};
