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
            $table->decimal('remise',10,2)->nullable();
            $table->date('date_deb')->nullable();
            $table->date('date_fin')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_student')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('id_offre')->references('id')->on('offres')->onDelete('cascade');
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
