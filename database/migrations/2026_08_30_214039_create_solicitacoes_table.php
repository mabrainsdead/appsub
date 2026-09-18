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
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('associado_id')
                ->nullable()
                ->constrained('associados')
                ->nullOnDelete();

            $table->foreignId('campeonato_id')
                ->nullable()
                ->constrained('campeonatos')
                ->nullOnDelete();

            $table->enum('tipo', [
                'nova_associacao',
                'renovacao',
            ]);

            $table->boolean('incluir_campeonato')->default(false);

            $table->decimal('valor', 10, 2);

            $table->string('comprovante')->nullable();

            $table->string('token', 64)->unique();

            $table->enum('status', [
                'pendente',
                'aprovada',
                'recusada',
            ])->default('pendente');

            $table->timestamp('aprovado_em')->nullable();
            $table->timestamp('recusado_em')->nullable();

            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes');
    }
};
