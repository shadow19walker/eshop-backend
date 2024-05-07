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
        Schema::create('expedition', function (Blueprint $table) {
            $table->integer("idExp",true,true);
            $table->integer("idVille",unsigned: true);
            $table->string("transporteur",250);
            $table->decimal("prix",8,2);
            $table->string("mobile1",15);
            $table->string("mobile2",15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedition');
    }
};
