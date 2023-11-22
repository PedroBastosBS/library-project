<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

final class AutorValueObjectException extends \DomainException
{
    public static function errorNome(): self
    {
        return new self(sprintf('É necessario informar o nome do autor'));
    }

    public static function errorData(): self
    {
        return new self(sprintf('É necessario informar a data de nascimento do autor'));
    }

    public static function errorLivro(): self
    {
        return new self(sprintf('O autor precisa ter pelo menos uma obra'));
    }

}
