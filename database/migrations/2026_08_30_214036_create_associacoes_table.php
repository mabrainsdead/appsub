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
        Schema::create('associacoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('associado_id')
                ->constrained('associados')
                ->cascadeOnDelete();

            $table->date('data_inicio');
            $table->date('data_fim');

            $table->decimal('valor', 10, 2);

            $table->enum('status', [
                'ativa',
                'vencida',
                'cancelada',
            ])->default('ativa');

            $table->timestamps();

            $table->index(['associado_id', 'data_fim']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associacoes');
    }
};
