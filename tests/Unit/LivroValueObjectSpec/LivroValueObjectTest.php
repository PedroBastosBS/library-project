<?php

namespace Tests\Unit\FuncionarioSpec;


use App\Domain\Exceptions\LivroValueObjectException;
use App\Domain\ValueObjects\LivroValueObject;
use PHPUnit\Framework\TestCase;

class LivroValueObjectTest extends TestCase
{

    public function testTituloEmpty(): void
    {
        $this->expectException(LivroValueObjectException::class);
        $this->expectExceptionMessage('Nenhum titulo encontrado');

        new LivroValueObject(
            '',
            'isnb 1',
        );
    }

    public function testIsbnEmpty(): void
    {
        $this->expectException(LivroValueObjectException::class);
        $this->expectExceptionMessage('Nenhum Isbn encontrado');

        new LivroValueObject(
            'livro 1',
            '',
        );
    }

}
