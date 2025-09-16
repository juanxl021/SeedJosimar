<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_caixa', 50);
            $table->string('numero_pasta', 50);
            $table->string('nome_aluno', 100);
            $table->string('nome_responsavel', 100);
            $table->date('data_nascimento');
            $table->string('obs')->nullable();

            // ✅ Adicionando o campo turma_id
            $table->foreignId('turma_id')->nullable()->constrained('turmas')->onDelete('set null');

            $table->timestamps();

            $table->index('numero_caixa');
            $table->index('numero_pasta');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
