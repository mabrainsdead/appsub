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
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->text('descricao')->nullable();

            $table->unsignedSmallInteger('ano');

            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();

            $table->decimal('valor', 10, 2);

            $table->string('edital')->nullable();

            $table->boolean('ativo')->default(false);

            $table->timestamps();

            $table->index(['ano', 'ativo']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campeonatos');
    }
};
