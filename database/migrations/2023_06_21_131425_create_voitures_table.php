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
        Schema::create('voitures', function (Blueprint $table) {
            $table->string('matricule', 20)->primary();
            $table->string('marque');
            $table->string('modele');
            $table->year('annee');
            $table->integer('capacite_habitacle');
            $table->string('carburation');
            $table->string('transmission');
            $table->integer('prix');
            $table->integer('compteur_km');
            $table->boolean('disponibilite')->default(true);
            $table->string('image', 500);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
