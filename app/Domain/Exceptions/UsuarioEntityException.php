<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

final class UsuarioEntityException extends \DomainException
{
    public static function errorID(): self
    {
        return new self(sprintf('Nenhum usuario encontrado para o ID'));
    }

    public static function errorNome(): self
    {
        return new self(sprintf('Nenhum usuario encontrado para o nome'));
    }

    public static function errorEndereco(): self
    {
        return new self(sprintf('Nenhum usuario encontrado para o endereco'));
    }

}
