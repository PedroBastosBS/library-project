<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

final class CategoriaValueObjectException extends \DomainException
{
    public static function errorNome(): self
    {
        return new self(sprintf('É necessario informar o nome da categoria'));
    }

    public static function errorDescricao(): self
    {
        return new self(sprintf('É necessario informar uma descrição da categoria'));
    }
    public static function errorLivro(): self
    {
        return new self(sprintf('A categoria precisa ter pelo menos uma obra'));
    }

}
