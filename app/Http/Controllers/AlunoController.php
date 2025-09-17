<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request)
{
    $query = Aluno::with('turma');

    if ($request->filled('filtro_nome')) {
        $query->where('nome_aluno', 'like', '%' . $request->filtro_nome . '%');
    }

    if ($request->filled('filtro_responsavel')) {
        $query->where('nome_responsavel', 'like', '%' . $request->filtro_responsavel . '%');
    }

    if ($request->filled('filtro_turma_id')) {
        $query->where('turma_id', $request->filtro_turma_id);
    }

    // ordenar se quiser (exemplo por nome do aluno)
    if ($request->filled('sort') && in_array($request->sort, ['id', 'nome_aluno', 'data_nascimento'])) {
        $direction = $request->direction === 'desc' ? 'desc' : 'asc';
        $query->orderBy($request->sort, $direction);
    }

    $alunos = $query->paginate(10)->withQueryString();

    $turmas = \App\Models\Turma::all(); // Para filtro no formulário

    return view('alunos.index', compact('alunos', 'turmas'))
        ->with([
            'sort' => $request->sort ?? null,
            'direction' => $request->direction ?? null,
        ]);
}
   public function create()
{
    $turmas = Turma::all();
    return view('alunos.create', compact('turmas'));
}

    public function store(Request $request)
    {
        $request->validate([
            'numero_caixa' => 'required|string|max:50',
            'numero_pasta' => 'required|string|max:50',
            'nome_aluno' => 'required|string|max:100',
            'nome_responsavel' => 'required|string|max:100',
            'data_nascimento' => 'required|date',
            'turma_id' => 'nullable|exists:turmas,id',
            'obs' => 'nullable|string',
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

   public function show(string $id)
{
    $aluno = Aluno::with('turma')->findOrFail($id);
    return view('show', compact('aluno'));
}

   public function edit($id)
{
    $aluno = Aluno::findOrFail($id);
    $turmas = Turma::all();
    return view('alunos.edit', compact('aluno', 'turmas'));
}

    public function update(Request $request, string $id)
    {
        $request->validate([
            'numero_caixa' => 'required|string|max:50',
            'numero_pasta' => 'required|string|max:50',
            'nome_aluno' => 'required|string|max:100',
            'nome_responsavel' => 'required|string|max:100',
            'data_nascimento' => 'required|date',
            'turma_id' => 'nullable|exists:turmas,id',
            'obs' => 'nullable|string',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno removido com sucesso!');
    }
}
