<?php

namespace App\Infra\Repositories;

use App\Core\Enums\LivroEnum;
use App\Core\Repositories\LivroRepository;
use App\Domain\DTOS\LivroDTO;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Collection;

class EloquentLivroRepository implements LivroRepository
{
    public function create(LivroDTO $livroDTO): void
    {
        Livro::create([
            'titulo' => $livroDTO->titulo,
            'isbn' => $livroDTO->isbn,
            'categoria' => $livroDTO->categoria,
            'autor' => $livroDTO->autor,
            'status' => $livroDTO->status,
        ]);
    }

    public function realizarEmprestimo(string $isbn):void
    {
        Livro::where('isbn', $isbn)
            ->update([
                'status' => LivroEnum::INDISPONIVEL
            ]);
    }

    public function finalizarEmprestimo(string $isbn):void
    {
        Livro::where('isbn', $isbn)
            ->update([
                'status' => LivroEnum::DISPONIVEL
            ]);
    }

    public function findByIsbn(string $isbn): Livro
    {
        return Livro::where('isbn', $isbn)->first();
    }

    public function all(): Collection
    {
        return Livro::all();
    }

}
