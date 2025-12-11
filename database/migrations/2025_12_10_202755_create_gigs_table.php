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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->string('artist');
            $table->string('venue');
            $table->date('gig_date');
            // La magia: Contexto de fútbol
            $table->string('football_team_status')->nullable(); // "Punteros", "Peleando descenso"
            $table->string('football_match_result')->nullable(); // "Ganamos 2-0", "No jugamos"
            $table->text('cultural_note')->nullable(); // Tweet o anécdota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs');
    }
};
