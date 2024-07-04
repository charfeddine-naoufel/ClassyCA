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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fr');
            $table->string('prenom_fr');
            $table->string('nom_ar')->nullable();
            $table->string('prenom_ar')->nullable();
            
            $table->string('specialite');
            $table->string('adresse')->nullable();
            $table->string('tel')->unique();
            $table->string('tel2')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('role')->default('teacher');
            $table->text('bio')->nullable();
            
            $table->string('photo')->nullable();
            $table->boolean('status')->default(1)->comment('1 active, 0 inactive');

            $table->string('password');
            
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
