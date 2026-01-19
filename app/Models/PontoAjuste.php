<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PontoAjuste extends Model
{
    protected $table = 'ponto_ajuste';
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'data' => 'date',
        ];
    }
    
    /**
     * Get the ponto razao that owns the ponto ajuste.
     */
    public function pontoRazao(): BelongsTo
    {
        return $this->belongsTo(PontoRazao::class, 'ponto_razao_id');
    }
    
    /**
     * Get the usuario that owns the ponto ajuste.
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}

