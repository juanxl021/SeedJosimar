<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turma;

class TurmaSeeder extends Seeder
{
    public function run(): void
    {
        // Criar 10 turmas de exemplo
        Turma::factory()->count(10)->create();
    }
}
