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
        Schema::table('associacoes', function (Blueprint $table) {
            $table->string('codigo_validacao', 64)
                ->unique()
                ->nullable()
                ->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('associacoes', function (Blueprint $table) {
            $table->dropUnique(['codigo_validacao']);
            $table->dropColumn('codigo_validacao');
        });
    }
};
