<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PontoRazao extends Model
{
    protected $table = 'ponto_razao';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'descricao',
        'ativo'
    ];
    
    /**
     * Get the ponto ajustes for the ponto razao.
     */
    public function pontoAjuste(): HasMany
    {
        return $this->hasMany(PontoAjuste::class);
    }
}

