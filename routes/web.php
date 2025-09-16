<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;

Route::resource('alunos', AlunoController::class);
Route::resource('turmas', TurmaController::class);

Route::get('/inicio', function () {
    return redirect()->route('alunos.index');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');