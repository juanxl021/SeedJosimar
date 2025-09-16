@extends('layouts.app')

@section('title', 'Editar Turma')

@section('content')
    <h1 class="mb-3">Editar Turma</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Turma</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $turma->nome) }}" required maxlength="100">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
