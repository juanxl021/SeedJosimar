<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

   // database/factories/AlunoFactory.php

public function definition()
{
    return [
        'numero_caixa' => $this->faker->word,
        'numero_pasta' => $this->faker->word,
        'nome_aluno' => $this->faker->name,
        'nome_responsavel' => $this->faker->name,
        'data_nascimento' => $this->faker->date(),
        'obs' => $this->faker->sentence(),
        'turma_id' => \App\Models\Turma::factory(),  // cria uma turma se não passar
    ];
}
}
