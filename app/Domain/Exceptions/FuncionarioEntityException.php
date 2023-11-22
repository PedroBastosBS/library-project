<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

final class FuncionarioEntityException extends \DomainException
{
    public static function errorID(string $id): self
    {
        return new self(sprintf('Nenhum funcionário encontrado para o ID'));
    }

    public static function errorNome(string $nome): self
    {
        return new self(sprintf('Nenhum funcionário encontrado para o nome'));
    }

    public static function errorCargo(string $cargo): self
    {
        return new self(sprintf('Nenhum funcionário encontrado para o cargo'));
    }

}
