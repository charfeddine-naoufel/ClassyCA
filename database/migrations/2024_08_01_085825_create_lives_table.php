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
        Schema::create('lives', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->integer('type')->default(2);
            $table->text('description')->nullable();
            $table->dateTime("start_time");
            $table->integer("duration");
            $table->text("join_url");
            $table->text("start_url");
            $table->string("meeting_id");

            
            $table->timestamps();
            $table->foreignId('course_id');
            $table->foreignId('chapitre_id');
            $table->foreignId('teacher_id');
            $table->foreignId('group_id');
            // Foreign key constraint
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');      

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
             $table->foreign('chapitre_id')->references('id')->on('chapitres')->onDelete('cascade');
             $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lives');
    }
};
