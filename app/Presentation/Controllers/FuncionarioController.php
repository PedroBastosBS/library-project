<?php

namespace App\Presentation\Controllers;

use App\Core\Exceptions\UsuarioException;
use App\Core\Mappers\LivroMapper;
use App\Core\Mappers\UsuarioMapper;

use App\Domain\DTOS\UsuarioDTO;
use App\Domain\UseCases\EmprestimoUseCase;
use App\Domain\UseCases\FuncionarioUseCase;
use App\Domain\ValueObjects\AutorValueObject;
use App\Domain\ValueObjects\CategoriaValueObject;
use App\Domain\ValueObjects\LivroValueObject;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FuncionarioController
{
    private FuncionarioUseCase $funcionarioUseCase;
    public function __construct(FuncionarioUseCase $funcionarioUseCase)
    {
        $this->funcionarioUseCase = $funcionarioUseCase;
    }

    public function cadastrarUsuario(Request $request): JsonResponse
    {
        try{
            $this->funcionarioUseCase->cadastrarUsuario(UsuarioMapper::toDTO(
                $request->get('nome'),
                $request->get('endereco')
            ));
            return response()->json('Usuario cadastrado com sucesso', Response::HTTP_CREATED);
        } catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function cadastrarLivro(Request $request): JsonResponse
    {
        $categoria = new CategoriaValueObject(
            $request->get('nomeCategoria'),
            $request->get('descricaoCategoria'),
        );
        $autor = new AutorValueObject(
            $request->get('nomeAutor'),
            $request->get('DataNascimento'),
            $request->get('obras')
        );
        $categoria->adicionarCategoria($request->get('categoria'));
        $livro = new LivroValueObject(
            $request->get('titulo'),
            $request->get('isbn'),
            $categoria,
            $request->get('status'),
            $autor
        );
        try{
            $this->funcionarioUseCase->cadastrarLivro(LivroMapper::toDTO(
                $livro
            ));
            return response()->json('Livro cadastrado com sucesso', Response::HTTP_CREATED);
        } catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function realizarEmprestimo(Request $request): JsonResponse
    {
        try{
          $this->funcionarioUseCase->registarEmprestimo(
              $request->get('usuarioID'),
              $request->get('isbn'),
              $request->get('dataEmprestimo'),
              $request->get('dataDevolucao')
          );

          return response()->json("Emprestimo realizado com sucesso", Response::HTTP_CREATED);
        }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            throw UsuarioException::new();
        }
        catch (\Throwable $e){
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function FinalizarEmprestimo(Request $request): JsonResponse
    {
        try{
            $this->funcionarioUseCase->finalizarEmprestimo(
                $request->get('isbn')
            );
            return response()->json("Emprestimo finalizado com sucesso", Response::HTTP_CREATED);
        } catch (\Throwable $e){
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listarLivros(): JsonResponse
    {
        try{
            $livros = $this->funcionarioUseCase->listarLivros();
            return response()->json([
                'livros' => $livros,
            ], Response::HTTP_OK);
        } catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listarUsuarios(): JsonResponse
    {
        try{
            $usuarios = $this->funcionarioUseCase->listarUsuarios();
            return response()->json([
                'usuarios' => $usuarios,
            ], Response::HTTP_OK);
        } catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listarEmprestimo(): JsonResponse
    {
        try{
            $emprestimo = $this->funcionarioUseCase->listarEmprestimos();
            return response()->json([
                'emprestimo' => $emprestimo,
            ], Response::HTTP_OK);
        } catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
