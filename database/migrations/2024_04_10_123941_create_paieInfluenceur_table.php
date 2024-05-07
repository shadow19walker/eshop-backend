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
        Schema::create('paieInfluenceur', function (Blueprint $table) {
            $table->integer("idPaiement",true,true);
            $table->dateTime("datePaie");
            $table->decimal("montant",10,2);
            $table->integer("idInf",unsigned: true);
            $table->tinyInteger("validite");
            $table->text("commentaire");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paieInfluenceur');
    }
};
