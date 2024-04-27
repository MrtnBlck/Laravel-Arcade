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
        Schema::create('contest_character', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('hero_hp')->default(20);
            $table->float('enemy_hp')->default(20);

            $table->unsignedBigInteger('character_id');
            $table->foreign('character_id')
                ->references('id')
                ->on('characters')
                ->onDelete('cascade');

            $table->unsignedBigInteger('contest_id');
            $table->foreign('contest_id')
                ->references('id')
                ->on('contests')
                ->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_character');
    }
};
