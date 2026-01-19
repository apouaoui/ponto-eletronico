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
        $usuarios = 
        [
          [
            'nome'          => 'ADMNISTRADOR',
            'cpf'          => '57761749370',
            'email'          => 'email@gmail.com',
            'senha'          => '89e495e7941cf9e40e6980d14a16bf023ccd4c91',
            'cargo'          => 'ADM',
            'admin'          => 1,
            'ativo'          => 1,
          ],
          [
            'nome'          => 'FUNCIONARIO 1',
            'cpf'          => '07033337477',
            'email'          => 'email2@gmail.com',
            'senha'          => '89e495e7941cf9e40e6980d14a16bf023ccd4c91',
            'cargo'          => 'AUX ADMINISTRATIVO',
            'admin'          => 0,
            'ativo'          => 1,
          ] 
        ];
        
        foreach ($usuarios as $usuario) {
            \App\Models\Usuario::create($usuario);
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
