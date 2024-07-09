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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->string('plan');
            $table->string('type_abon');
            $table->enum('status', [ 'active', 'canceled','expired'])->default('active');
            $table->decimal('remise',6,3)->nullable();
            $table->decimal('montant',6,3);
            $table->date('date_deb')->nullable();
            $table->date('date_fin')->nullable();
            $table->timestamps();
            $table->foreignId('student_id');
            $table->foreignId('offre_id');
           

            // Foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
