<?php

declare(strict_types=1);

namespace App\Core\Exceptions;


final class LivroException extends \DomainException
{
    public static function new(): self
    {
        return new self("O livro está indisponivel");
    }
}
