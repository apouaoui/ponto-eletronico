<?php

namespace Database\Seeders;

use App\Models\PontoRazao;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Seed the application's database with test data.
     */
    public function run(): void
    {
        $this->command->info('🌱 Inserindo dados de teste...');
        
        // Criar usuários de teste
        $usuarios = [
            [
                'nome'   => 'João Silva',
                'cpf'    => '11111111111',
                'email'  => 'joao@teste.com',
                'senha'  => sha1('123456'),
                'cargo'  => 'Desenvolvedor',
                'regime' => 'CLT',
                'local'  => 'São Paulo',
                'admin'  => 0,
                'ativo'  => 1,
            ],
            [
                'nome'   => 'Maria Santos',
                'cpf'    => '22222222222',
                'email'  => 'maria@teste.com',
                'senha'  => sha1('123456'),
                'cargo'  => 'Designer',
                'regime' => 'CLT',
                'local'  => 'Rio de Janeiro',
                'admin'  => 0,
                'ativo'  => 1,
            ],
            [
                'nome'   => 'Pedro Oliveira',
                'cpf'    => '33333333333',
                'email'  => 'pedro@teste.com',
                'senha'  => sha1('123456'),
                'cargo'  => 'Gerente',
                'regime' => 'CLT',
                'local'  => 'Belo Horizonte',
                'admin'  => 0,
                'ativo'  => 1,
            ],
            [
                'nome'   => 'Ana Costa',
                'cpf'    => '44444444444',
                'email'  => 'ana@teste.com',
                'senha'  => sha1('123456'),
                'cargo'  => 'Analista',
                'regime' => 'CLT',
                'local'  => 'Brasília',
                'admin'  => 0,
                'ativo'  => 1,
            ],
            [
                'nome'   => 'Carlos Souza',
                'cpf'    => '55555555555',
                'email'  => 'carlos@teste.com',
                'senha'  => sha1('123456'),
                'cargo'  => 'Coordenador',
                'regime' => 'CLT',
                'local'  => 'Curitiba',
                'admin'  => 0,
                'ativo'  => 0, // Usuário inativo para teste
            ],
        ];

        foreach ($usuarios as $usuario) {
            Usuario::firstOrCreate(
                ['cpf' => $usuario['cpf']],
                $usuario
            );
        }

        $this->command->info('✅ ' . count($usuarios) . ' usuários de teste criados!');
        
        // Criar razões de ajuste de ponto
        $razoes = [
            ['descricao' => 'Consulta médica', 'ativo' => 1],
            ['descricao' => 'Acompanhamento de parente em consulta médica', 'ativo' => 1],
            ['descricao' => 'Falha na máquina de registro de ponto', 'ativo' => 1],
            ['descricao' => 'Problemas técnicos', 'ativo' => 1],
            ['descricao' => 'Reunião externa', 'ativo' => 1],
            ['descricao' => 'Home Office', 'ativo' => 1],
            ['descricao' => 'Outra', 'ativo' => 1],
        ];

        foreach ($razoes as $razao) {
            PontoRazao::firstOrCreate(
                ['descricao' => $razao['descricao']],
                $razao
            );
        }

        $this->command->info('✅ ' . count($razoes) . ' razões de ajuste criadas!');
        
        $this->command->info('');
        $this->command->info('📋 Credenciais dos usuários de teste:');
        $this->command->info('   CPF: 11111111111 | Senha: 123456 | João Silva (Ativo)');
        $this->command->info('   CPF: 22222222222 | Senha: 123456 | Maria Santos (Ativo)');
        $this->command->info('   CPF: 33333333333 | Senha: 123456 | Pedro Oliveira (Ativo)');
        $this->command->info('   CPF: 44444444444 | Senha: 123456 | Ana Costa (Ativo)');
        $this->command->info('   CPF: 55555555555 | Senha: 123456 | Carlos Souza (Inativo)');
    }
}

