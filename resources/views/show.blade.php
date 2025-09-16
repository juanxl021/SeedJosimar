@extends('layouts.app')

@section('title', isset($aluno) ? 'Detalhes do Aluno' : (isset($turma) ? 'Detalhes da Turma' : 'Detalhes'))

@section('content')

    @if(isset($aluno))
        <h1>Detalhes do Aluno</h1>

        <div><strong>ID:</strong> {{ $aluno->id }}</div>
        <div><strong>Nome do Aluno:</strong> {{ $aluno->nome_aluno }}</div>
        <div><strong>Número da Caixa:</strong> {{ $aluno->numero_caixa }}</div>
        <div><strong>Número da Pasta:</strong> {{ $aluno->numero_pasta }}</div>
        <div><strong>Nome do Responsável:</strong> {{ $aluno->nome_responsavel }}</div>
        <div><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($aluno->data_nascimento)->format('d/m/Y') }}</div>
        <div><strong>Turma:</strong> {{ $aluno->turma->nome ?? 'Sem Turma' }}</div>
        <div><strong>Observações:</strong> {!! nl2br(e($aluno->obs)) !!}</div>

        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning">Editar Aluno</a>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Voltar</a>
    @elseif(isset($turma))
        <h1>Detalhes da Turma</h1>

        <div><strong>ID:</strong> {{ $turma->id }}</div>
        <div><strong>Nome da Turma:</strong> {{ $turma->nome }}</div>

        <h3 class="mt-4">Alunos da Turma</h3>
        @if($turma->alunos->count())
            <ul>
                @foreach($turma->alunos as $aluno)
                    <li><a href="{{ route('alunos.show', $aluno->id) }}">{{ $aluno->nome_aluno }}</a></li>
                @endforeach
            </ul>
        @else
            <p>Sem alunos cadastrados nessa turma.</p>
        @endif

        <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-warning">Editar Turma</a>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Voltar</a>
    @else
        <p>Nenhum dado disponível para exibir.</p>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
    @endif

@endsection
