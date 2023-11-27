<?php

namespace App\Infra\Repositories;

use App\Core\Repositories\EmprestimoRepository;
use App\Domain\DTOS\EmprestimoDTO;
use App\Models\Emprestimo;
use Illuminate\Database\Eloquent\Collection;

final class EloquentEmprestimoRepository implements EmprestimoRepository
{
    public function create(EmprestimoDTO $emprestimoDTO): void
    {
        Emprestimo::create([
            'dataEmprestimo' => $emprestimoDTO->dataEmprestimo,
            'dataDevolucao' => $emprestimoDTO->dataDevolucao,
            'livro' => $emprestimoDTO->livro,
            'usuario'=> $emprestimoDTO->usuario
        ]);
    }

    public function destroy(string $isbn): void
    {
        Emprestimo::where('livro',$isbn)->delete();
    }

    public function all(): Collection
    {
        return Emprestimo::all();
    }
}
