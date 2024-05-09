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
        Schema::create('facture', function (Blueprint $table) {
            $table->integer("idFac",true,true);
            $table->timestamp("dateFac");
            $table->decimal("remise",4,2);
            $table->string("tel",15);
            $table->smallInteger("typeFac",unsigned: true);
            $table->integer("idCaissiere",unsigned: true);
            $table->decimal("capital",10,2);
            $table->decimal("tva",10,2);
            $table->string("codePromo",15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture');
    }
};
