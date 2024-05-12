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
        Schema::create('influenceur', function (Blueprint $table) {
            $table->integer("idInf",true,true);
            $table->string("nom",50);
            $table->string("mobile",50);
            $table->string("codePromo",20);
            $table->tinyInteger("actif");
            $table->decimal("montant",10,2);
            $table->string("pwd",30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influenceur');
    }
};
