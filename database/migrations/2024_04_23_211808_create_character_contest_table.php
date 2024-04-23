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
        Schema::create('character_contest', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_contest');
    }
};