<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InscricaoCampeonato extends Model
{
    protected $table = 'inscricoes_campeonatos';

    protected $fillable = [
        'campeonato_id',
        'associado_id',
        'status',
    ];

    public function campeonato(): BelongsTo
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function associado(): BelongsTo
    {
        return $this->belongsTo(Associado::class);
    }
}
