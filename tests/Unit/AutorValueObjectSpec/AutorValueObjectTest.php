<?php

namespace Tests\Unit\FuncionarioSpec;

use App\Domain\Entities\UsuarioEntity;
use App\Domain\Exceptions\AutorValueObjectException;
use App\Domain\Exceptions\UsuarioEntityException;
use App\Domain\ValueObjects\AutorValueObject;
use PHPUnit\Framework\TestCase;

class AutorValueObjectTest extends TestCase
{

    public function testNomeEmpty(): void
    {
        $this->expectException(AutorValueObjectException::class);
        $this->expectExceptionMessage('É necessario informar o nome do autor');

        new AutorValueObject(
            '',
            '26/10/1987',
            ['obra' => 'conto da seria']
        );
    }

    public function testDataNascimentoEmpty(): void
    {
        $this->expectException(AutorValueObjectException::class);
        $this->expectExceptionMessage('É necessario informar a data de nascimento do autor');

        new AutorValueObject(
            'autor1',
            '',
            ['obra' => 'conto da seria']
        );
    }

    public function testLivroEmpty(): void
    {
        $this->expectException(AutorValueObjectException::class);
        $this->expectExceptionMessage('O autor precisa ter pelo menos uma obra');

        new AutorValueObject(
            'autor2',
            '26/10/1987',
            []
        );
    }

    public function testListarLivros(): void
    {

       $entity = new AutorValueObject(
            'usuario1',
            '24/11/1998',
            ['livro' => 'teste']
        );

        $this->assertEquals(['livro' => 'teste'], $entity->listarLivros());
    }
}
