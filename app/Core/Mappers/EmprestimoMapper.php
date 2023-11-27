<?php
declare(strict_types=1);

namespace App\Core\Mappers;

use App\Domain\DTOS\EmprestimoDTO;
use App\Domain\ValueObjects\EmprestimoValueObject;
use App\Models\Emprestimo;
use Illuminate\Database\Eloquent\Collection;

final class EmprestimoMapper
{
    static public function toDTO(EmprestimoValueObject $emprestimoValueObject): EmprestimoDTO
    {
        $dto = new EmprestimoDTO();
        $dto->dataEmprestimo = $emprestimoValueObject->getDataEmprestimo();
        $dto->dataDevolucao = $emprestimoValueObject->getDataDevolucao();
        $dto->livro = $emprestimoValueObject->listarTitulo();
        $dto->usuario = $emprestimoValueObject->usuarioEmprestimo();
        return $dto;
    }

    static public function toCore(Emprestimo $emprestimo):EmprestimoDTO
    {
        $dto = new EmprestimoDTO();
        $dto->usuario = $emprestimo->usuario;
        $dto->livro = $emprestimo->livro;
        $dto->dataEmprestimo = $emprestimo->dataEmprestimo;
        $dto->dataDevolucao = $emprestimo->dataDevolucao;
        return $dto;
    }

    static public function toPresentation(Collection $emprestimos): array
    {
        return $emprestimos->map(fn ($emprestimo) => self::toCore($emprestimo))->toArray();
    }

}
