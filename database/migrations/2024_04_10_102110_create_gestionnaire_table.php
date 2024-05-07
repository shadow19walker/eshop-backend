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
        Schema::create('gestionnaire', function (Blueprint $table) {
            $table->integer("idGest",true,true);
            $table->string("nomGest",45);
            $table->integer("typeGest");
            $table->string("login",20);
            $table->string("pwd",20);
            $table->tinyInteger("actif");
            $table->string("mobile",20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestionnaire');
    }
};
