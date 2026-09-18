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
        Schema::create('inscricoes_campeonatos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('campeonato_id')
                ->constrained('campeonatos')
                ->cascadeOnDelete();

            $table->foreignId('associado_id')
                ->constrained('associados')
                ->cascadeOnDelete();

            $table->enum('status', [
                'pendente',
                'confirmada',
                'cancelada',
            ])->default('pendente');

            $table->timestamps();

            $table->unique(['campeonato_id', 'associado_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricoes_campeonatos');
    }
};
