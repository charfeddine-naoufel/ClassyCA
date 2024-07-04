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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fr');
            $table->string('prenom_fr');
            $table->string('nom_ar')->nullable();
            $table->string('prenom_ar')->nullable();

            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('gouvernorat')->nullable();
            $table->string('tel')->unique();
            $table->string('tel2')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('role')->default('student');
            $table->date('date_naiss')->nullable();
            $table->enum('genre', ['M', 'F'])->nullable();

            
           
            $table->boolean('status')->default(1)->comment('1 active, 0 inactive');
            $table->string('password');
          
            
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
