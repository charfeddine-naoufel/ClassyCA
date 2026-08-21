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
    Schema::table('seances', function (Blueprint $table) {

        $table->foreignId('support_id')
            ->nullable()
            ->after('chapitre_id')
            ->constrained('supports')
            ->nullOnDelete();

    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('seances', function (Blueprint $table) {

        $table->dropForeign(['support_id']);
        $table->dropColumn('support_id');

    });
}
};
