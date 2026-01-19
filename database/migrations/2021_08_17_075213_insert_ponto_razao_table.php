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
        $razoes = 
        [
          [
            'descricao'          => 'Consulta médica',
            'ativo'          => 1,
          ],
          [
            'descricao'          => 'Acompanhamento de parente em consulta médica',
            'ativo'          => 1,
          ],
          [
            'descricao'          => 'Falha na máquina de registro de ponto',
            'ativo'          => 1,
          ], 
          [
            'descricao'          => 'Outra',
            'ativo'          => 1,
          ]  
        ];
        
        foreach ($razoes as $razao) {
            \App\Models\PontoRazao::create($razao);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
