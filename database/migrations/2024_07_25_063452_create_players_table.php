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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->default(0);
            $table->string('name')->nullable();
            $table->string('img')->nullable();
            $table->string('position')->nullable();
            $table->string('condition')->nullable();
            $table->string('area')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE players ADD FULLTEXT index players_name_position_condition_area_type_fulltext (`name`,`position`,`condition`,`area`,`type`) with parser ngram');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
