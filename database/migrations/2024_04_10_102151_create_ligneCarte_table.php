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
        Schema::create('ligneCarte', function (Blueprint $table) {
            $table->integer("id",true,true);
            $table->integer("idFac",unsigned: true);
            $table->integer("idCarte",unsigned: true);
            $table->integer("point",unsigned: true);
            $table->timestamp("dateOpera");
            $table->decimal("montantFac",10,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligneCarte');
    }
};
