<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

final class LivroValueObjectException extends \DomainException
{
    public static function errorTitulo(): self
    {
        return new self(sprintf('Nenhum titulo encontrado'));
    }

    public static function errorIsbn(): self
    {
        return new self(sprintf('Nenhum Isbn encontrado'));
    }

}
