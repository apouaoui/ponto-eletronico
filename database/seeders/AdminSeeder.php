<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database with admin user.
     */
    public function run(): void
    {
        // Verifica se já existe um admin
        $adminExists = Usuario::where('admin', 1)->exists();
        
        if (!$adminExists) {
            Usuario::create([
                'nome'   => 'Administrador',
                'cpf'    => '00000000000',
                'email'  => 'admin@admin.com',
                'senha'  => sha1('admin123'), // Senha: admin123
                'cargo'  => 'Administrador',
                'admin'  => 1,
                'ativo'  => 1,
            ]);
            
            $this->command->info('✅ Administrador criado com sucesso!');
            $this->command->info('   CPF: 00000000000');
            $this->command->info('   Senha: admin123');
        } else {
            $this->command->warn('⚠️  Administrador já existe no banco de dados.');
        }
    }
}

