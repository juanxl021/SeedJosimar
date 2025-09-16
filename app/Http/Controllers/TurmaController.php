<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index(Request $request)
    {
        $query = Turma::query();

        if ($request->has('filtro_nome')) {
            $query->where('nome', 'like', '%' . $request->filtro_nome . '%');
        }

        // Paginação de turmas
        $turmas = $query->paginate(10); // Paginação aplicada aqui também

        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
        ]);

        Turma::create($request->only('nome'));

        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    public function show(string $id)
    {
        // Evitar carregar todos os alunos de uma vez, paginando ou selecionando apenas os campos necessários
        $turma = Turma::with(['alunos' => function($query) {
            $query->paginate(10); // Paginação de alunos para evitar carregar todos
        }])->findOrFail($id);

        return view('show', compact('turma'));
    }

    public function edit($id)
    {
        $turma = Turma::findOrFail($id);
        return view('turmas.edit', compact('turma'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
        ]);

        $turma = Turma::findOrFail($id);
        $turma->update($request->only('nome'));

        return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turmas.index')->with('success', 'Turma removida com sucesso!');
    }
}
