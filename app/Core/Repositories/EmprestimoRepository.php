<?php

declare(strict_types=1);

namespace App\Core\Repositories;

use App\Domain\DTOS\EmprestimoDTO;
use Illuminate\Database\Eloquent\Collection;

interface EmprestimoRepository {
    /**
     * Cria emprestimo.
     * @param  $emprestimoDTO  $emprestimoDTO.
     * @return void;
     */
    public function create(EmprestimoDTO $emprestimoDTO): void;
    /**
     * Finalizar emprestimo.
     * @param  int  $isbn.
     * @return void;
     */
    public function destroy(string $isbn): void;

    /**
     * lista todos os emprestimos cadastrados.
     * @return Collection;
     */
    public function all(): Collection;

}
