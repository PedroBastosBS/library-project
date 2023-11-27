<?php

namespace App\Domain\UseCases;

use App\Domain\DTOS\EmprestimoDTO;
use App\Domain\DTOS\LivroDTO;
use App\Domain\DTOS\UsuarioDTO;

interface FuncionarioUseCase
{
    /**
     * Cadastar livro no sistema.
     * @param  LivroDTO  $livro.
     * @return void;
     */
    public function cadastrarLivro(LivroDTO $livroDTO): void;
    /**
     * Cadastar livro no sistema.
     * @param  LivroDTO  $livro.
     * @return void;
     */
    public function cadastrarUsuario(UsuarioDTO $usuarioDTO): void;

    /**
     * Finaliza o emprestimo no sistema.
     * @param string $isbn.
     * @return void;
     */
    public function finalizarEmprestimo(string $isbn): void;
    /**
     * Registara o emprestimo no sistema.
     * @param  string  $usuarioID.
     * @param string $isbn.
     * @return void;
     */
    public function registarEmprestimo(string $usuarioID, string $isbn,string $dataEmprestimo, string $dataDevolucao): void;
    /**
     * lista todos os livros cadastrados no sistema
     * @return array;
     */
    public function listarLivros(): array;
    /**
     * lista todos os usuarios cadastrados no sistema
     * @return array;
     */
    public function listarUsuarios(): array;

    public function listarEmprestimos(): array;

}
