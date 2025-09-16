<?php

namespace Database\Factories;

use App\Models\Turma;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurmaFactory extends Factory
{
    protected $model = Turma::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->word(),
        ];
    }
}
