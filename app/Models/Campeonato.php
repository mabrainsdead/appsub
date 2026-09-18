<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campeonato extends Model
{
    protected $table = 'campeonatos';

    protected $fillable = [
        'nome',
        'descricao',
        'ano',
        'data_inicio',
        'data_fim',
        'valor',
        'edital',
        'ativo',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
        'valor' => 'decimal:2',
        'ativo' => 'boolean',
    ];

    public function inscricoes(): HasMany
    {
        return $this->hasMany(InscricaoCampeonato::class);
    }
}
