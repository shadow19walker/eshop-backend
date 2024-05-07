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
        Schema::create('ligneFacture', function (Blueprint $table) {
            $table->integer("idLFac",true,true);
            $table->integer("idFac",unsigned: true);
            $table->integer("codePro",unsigned: true);
            $table->decimal("prix",10,2);
            $table->smallInteger("qte",unsigned: true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligneFacture');
    }
};
