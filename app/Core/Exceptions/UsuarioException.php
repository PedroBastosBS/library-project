<?php

declare(strict_types=1);

namespace App\Core\Exceptions;


final class UsuarioException extends \DomainException
{
    public static function new(): self
    {
        return new self("Usuario não foi encontrado");
    }

}
