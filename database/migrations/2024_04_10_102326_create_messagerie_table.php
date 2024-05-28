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
        Schema::create('messagerie', function (Blueprint $table) {
            $table->integer("idmsg",true,true);
            $table->string("mobile",20);
            $table->text("wsms");
            $table->dateTime("dateEnvoie")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer("type");
            $table->integer("service");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messagerie');
    }
};
