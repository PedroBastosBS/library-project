<?php

namespace App\Core\Services;

use App\Core\Enums\LivroEnum;
use App\Core\Exceptions\LivroException;
use App\Core\Exceptions\UsuarioException;
use App\Core\Mappers\EmprestimoMapper;
use App\Core\Mappers\LivroMapper;
use App\Core\Mappers\UsuarioMapper;
use App\Core\Repositories\EmprestimoRepository;
use App\Core\Repositories\LivroRepository;
use App\Core\Repositories\UsuarioRepository;
use App\Domain\DTOS\EmprestimoDTO;
use App\Domain\DTOS\LivroDTO;
use App\Domain\DTOS\UsuarioDTO;
use App\Domain\UseCases\FuncionarioUseCase;

class FuncionarioService implements FuncionarioUseCase
{
    private UsuarioRepository $usuarioRepository;
    private LivroRepository $livroRepository;
    private EmprestimoRepository $emprestimoRepository;
    public function __construct(UsuarioRepository $usuarioRepository,LivroRepository $livroRepository,EmprestimoRepository $emprestimoRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->livroRepository = $livroRepository;
        $this->emprestimoRepository = $emprestimoRepository;
    }

    public function cadastrarLivro(LivroDTO $livroDTO): void
    {
        $this->livroRepository->create($livroDTO);
    }
    public function cadastrarUsuario(UsuarioDTO $usuarioDTO): void
    {
        $this->usuarioRepository->create($usuarioDTO);
    }

    public function registarEmprestimo(string $usuarioID, string $isbn, string $dataEmprestimo, string $dataDevolucao): void
    {
        $usuario = $this->usuarioRepository->findByID($usuarioID);
        if(empty($usuario)){
            throw UsuarioException::new();
        }

        $livro = LivroMapper::toCore($this->livroRepository->findByIsbn($isbn));
        if($livro->status == LivroEnum::INDISPONIVEL->value){
            throw LivroException::new();
        }

        $this->livroRepository->realizarEmprestimo($livro->isbn);
        $this->emprestimoRepository->create(EmprestimoDTO::new(
            $dataEmprestimo,
            $dataDevolucao,
            $usuario->id,
            $livro->isbn
        ));
    }

    public function finalizarEmprestimo(string $isbn): void
    {
        $this->livroRepository->finalizarEmprestimo($isbn);
        $this->emprestimoRepository->destroy($isbn);
    }

    public function listarLivros(): array
    {
        $livros = $this->livroRepository->all();
        return LivroMapper::toPresentation($livros);
    }

    public function listarUsuarios(): array
    {
        $usuarios = $this->usuarioRepository->all();
        return UsuarioMapper::toPresentation($usuarios);
    }

    public function listarEmprestimos(): array
    {
        $emprestimos = $this->emprestimoRepository->all();
        return EmprestimoMapper::toPresentation($emprestimos);
    }
}
