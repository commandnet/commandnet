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
        Schema::create('map_overlay_layers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("url");
            $table->string("attribution")->nullable();
            $table->integer("maxzoom")->nullable();
            $table->string("type");
            $table->string("wmslayername")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_overlay_layers');
    }
};