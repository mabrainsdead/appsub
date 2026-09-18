<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Associado extends Model
{
    protected $table = 'associados';

    protected $fillable = [
        'numero',
        'nome',
        'cpf',
        'data_nascimento',
        'email',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function associacoes(): HasMany
    {
        return $this->hasMany(Associacao::class);
    }

    public function solicitacoes(): HasMany
    {
        return $this->hasMany(Solicitacao::class);
    }

    public function inscricoesCampeonatos(): HasMany
    {
        return $this->hasMany(InscricaoCampeonato::class);
    }
    public function associacaoVigente(): HasOne
    {
        return $this->hasOne(Associacao::class)
            ->where('data_inicio', '<=', now())
            ->where('data_fim', '>=', now())
            ->where('status', 'ativa')
            ->latestOfMany('data_fim');
    }
}
