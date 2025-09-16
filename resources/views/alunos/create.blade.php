@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
    <h1>Cadastrar Novo Aluno</h1>

    <form action="{{ route('alunos.store') }}" method="POST">
        @include('alunos._form')
    </form>
@endsection
