<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tontine', function (Blueprint $table) {
            $table->integer("idTontine",true,true);
            $table->dateTime("dateCotisation")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal("montant",10,2);
            $table->text("commentaire");
            $table->integer("idGest",unsigned: true);
            $table->tinyInteger("validite");
            $table->integer("idCarte",unsigned: true);
            $table->tinyInteger("action");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tontine');
    }
};
