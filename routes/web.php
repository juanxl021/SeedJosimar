<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('home');
});


Route::resource('alunos', AlunoController::class);
Route::resource('turmas', TurmaController::class);


