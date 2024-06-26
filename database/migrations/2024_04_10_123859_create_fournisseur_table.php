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
        Schema::create('fournisseur', function (Blueprint $table) {
            $table->integer("idFour",true,true);
            $table->string("nom",100);
            $table->string("adresse",200);
            $table->string("ville",50);
            $table->string("pays",50);
            $table->string("mobile1",20);
            $table->string("mobile2",20);
            $table->dateTime("dateCreation")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger("type");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseur');
    }
};
