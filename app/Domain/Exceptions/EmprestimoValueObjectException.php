<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

final class EmprestimoValueObjectException extends \DomainException
{
    public static function errorDataEmprestimo(): self
    {
        return new self(sprintf('É necessario informar a data de emprestimo'));
    }

    public static function errorDataDevolucao(): self
    {
        return new self(sprintf('É necessario informar a data de devolucao'));
    }

}
