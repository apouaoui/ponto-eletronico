<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    protected $table = 'usuario';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'email',
        'senha',
        'cargo',
        'admin',
        'ativo'
    ];

    /**
     * Get the ponto ajustes for the usuario.
     */
    public function pontoAjuste(): HasMany
    {
        return $this->hasMany(PontoAjuste::class);
    }
    
    /**
     * Get the pontos for the usuario.
     */
    public function ponto(): HasMany
    {
        return $this->hasMany(Ponto::class);
    }
}

