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
        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->decimal('price',6,3);
            $table->string('image');
            $table->timestamps();
            $table->foreignId('matiere_id');
            $table->foreignId('offre_id');
           

             // Foreign key constraint
             $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
             $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packs');
    }
};
