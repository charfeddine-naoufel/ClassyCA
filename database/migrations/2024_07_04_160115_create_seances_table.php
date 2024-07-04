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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->time('heure_deb');
			$table->time('heure_fin');
            $table->boolean('live')->default(0)->comment('1 live, 0 recorded');
            $table->timestamps();

             // Foreign key constraint
             $table->foreign('mat_id')->references('id')->on('matiers')->onDelete('cascade');
             $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
             $table->foreign('chapitre_id')->references('id')->on('chapitres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
