<?php

namespace App\Presentation\Controllers;

use App\Core\Mappers\EmprestimoMapper;
use App\Domain\DTOS\EmprestimoDTO;
use App\Domain\Entities\UsuarioEntity;
use App\Domain\ValueObjects\EmprestimoValueObject;
use App\Domain\ValueObjects\LivroValueObject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Domain\UseCases\EmprestimoUseCase;
use Illuminate\Http\Response;

class EmprestimoController extends Controller
{
    private EmprestimoUseCase $emprestimoUseCase;

    public function __construct(EmprestimoUseCase $emprestimoUseCase){
        $this->emprestimoUseCase = $emprestimoUseCase;
    }

    public function realizarEmprestimo(Request $request): JsonResponse
    {
        try{
            $livro = new LivroValueObject($request->get('livro'), $request->get('isbn'));
            $usuario = new UsuarioEntity($request->get('usuarioID'),$request->get('nomeUsuario'),$request->get('rua'), $request->get('historico'));
            $emprestimo = new EmprestimoValueObject(
                $request->get('dataEmprestimo'),
                $request->get('dataDevolução'),
                $livro,
                $usuario
            );

            $this->emprestimoUseCase->realizarEmprestimo(EmprestimoMapper::toDTO($emprestimo));
            return response()->json('Emprestimo realizado com sucesso',Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function FinalizarEmprestimo(string $id): JsonResponse
    {
        $this->emprestimoUseCase->FinalizarEmprestimo($id);
        return response()->json('sucesso');
    }



}
