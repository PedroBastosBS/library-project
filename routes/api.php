<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => '/emprestimo'], function(){
    Route::post('/', [\App\Presentation\Controllers\EmprestimoController::class,'realizarEmprestimo']);
    Route::delete('/{id}', [\App\Presentation\Controllers\EmprestimoController::class,'FinalizarEmprestimo']);
});

Route::group(['prefix' => '/funcionario'], function(){
   Route::post('/usuario', [\App\Presentation\Controllers\FuncionarioController::class, 'cadastrarUsuario']);
   Route::post('/livro', [\App\Presentation\Controllers\FuncionarioController::class, 'cadastrarLivro']);
   Route::put('/emprestimo', [\App\Presentation\Controllers\FuncionarioController::class, 'realizarEmprestimo']);
   Route::put('/finalizar', [\App\Presentation\Controllers\FuncionarioController::class, 'FinalizarEmprestimo']);
   Route::get('/listar-livros', [\App\Presentation\Controllers\FuncionarioController::class, 'listarLivros']);
   Route::get('/listar-usuarios', [\App\Presentation\Controllers\FuncionarioController::class, 'listarUsuarios']);
   Route::get('/listar-emprestimos', [\App\Presentation\Controllers\FuncionarioController::class, 'listarEmprestimo']);


});
