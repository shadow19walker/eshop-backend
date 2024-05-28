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
        Schema::create('gestionStock', function (Blueprint $table) {
            $table->integer("idStock",true,true);
            $table->integer("qte",unsigned: true);
            $table->dateTime("dateStock")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger("operation");
            $table->integer("idGest",unsigned: true);
            $table->integer("codePro",unsigned: true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestionStock');
    }
};
