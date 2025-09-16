<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\Turma;

class AlunoSeeder extends Seeder
{
    public function run()
    {
        // Buscar todas as turmas sem paginação
        $turmas = Turma::all();

        // Criar 10 alunos
        Aluno::factory()->count(10)->make()->each(function ($aluno) use ($turmas) {
            // Associar aluno a uma turma aleatória
            $aluno->turma_id = $turmas->random()->id;
            $aluno->save();
        });
    }
}
