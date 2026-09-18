<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Associacao extends Model
{
    protected $table = 'associacoes';

    protected $fillable = [
        'associado_id',
        'data_inicio',
        'data_fim',
        'valor',
        'status',
        'codigo_validacao',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
        'valor' => 'decimal:2',
    ];

    public function associado(): BelongsTo
    {
        return $this->belongsTo(Associado::class);
    }
}
