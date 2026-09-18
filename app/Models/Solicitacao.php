<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Solicitacao extends Model
{
    protected $table = 'solicitacoes';

    protected $fillable = [
        'associado_id',
        'nome',
        'cpf',
        'data_nascimento',
        'email',
        'campeonato_id',
        'tipo',
        'incluir_campeonato',
        'valor',
        'comprovante',
        'token',
        'status',
        'aprovado_em',
        'recusado_em',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'incluir_campeonato' => 'boolean',
        'valor' => 'decimal:2',
        'aprovado_em' => 'datetime',
        'recusado_em' => 'datetime',
    ];

    public function associado(): BelongsTo
    {
        return $this->belongsTo(Associado::class);
    }

    public function campeonato(): BelongsTo
    {
        return $this->belongsTo(Campeonato::class);
    }
}
