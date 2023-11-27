<?php

namespace App\Core\Repositories;

use App\Domain\DTOS\LivroDTO;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Collection;

interface LivroRepository
{
    /**
     * Caradastra um livro.
     * @param  LivroDTO  $livroDTO.
     * @return void;
     */
    public function create(LivroDTO $livroDTO): void;
    /**
     * realiza o emprestimo do livro mudando o status.
     * @param  string  $isbn.
     * @return void;
     */
    public function realizarEmprestimo(string $isbn): void;
    /**
     * busca o livro pelo seu isbn.
     * @param  string  $isbn.
     * @return Livro;
     */
    public function finalizarEmprestimo(string $isbn): void;
    /**
     * finaliza o emprestimo mudando o status.
     * @param  string  $isbn.
     * @return Livro;
     */
    public function findByIsbn(string $isbn): Livro;
    /**
     * busca todos os livros cadastrados.
     * @return Collection;
     */
    public function all(): Collection;

}
