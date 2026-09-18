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
        Schema::table('solicitacoes', function (Blueprint $table) {
            $table->string('nome')->nullable()->after('associado_id');
            $table->string('cpf', 11)->nullable()->after('nome');
            $table->date('data_nascimento')->nullable()->after('cpf');
            $table->string('email')->nullable()->after('data_nascimento');
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::table('solicitacoes', function (Blueprint $table) {
            $table->dropColumn([
                'nome',
                'cpf',
                'data_nascimento',
                'email',
            ]);
        });
    }
};
