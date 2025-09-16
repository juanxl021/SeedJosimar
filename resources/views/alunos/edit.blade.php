@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
    <h1>Editar Aluno: {{ $aluno->nome_aluno }}</h1>

    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
        @method('PUT')
        @include('alunos._form')
    </form>
@endsection
