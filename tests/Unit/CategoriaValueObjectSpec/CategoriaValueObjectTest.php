<?php

namespace Tests\Unit\FuncionarioSpec;

use App\Domain\Entities\UsuarioEntity;
use App\Domain\Exceptions\AutorValueObjectException;
use App\Domain\Exceptions\CategoriaValueObjectException;
use App\Domain\Exceptions\UsuarioEntityException;
use App\Domain\ValueObjects\AutorValueObject;
use App\Domain\ValueObjects\CategoriaValueObject;
use PHPUnit\Framework\TestCase;

class CategoriaValueObjectTest extends TestCase
{

    public function testNomeEmpty(): void
    {
        $this->expectException(CategoriaValueObjectException::class);
        $this->expectExceptionMessage('É necessario informar o nome da categoria');

        new CategoriaValueObject(
            '',
            'descricao1',
            ['obra' => 'conto da seria']
        );
    }

    public function testDescricao(): void
    {
        $this->expectException(CategoriaValueObjectException::class);
        $this->expectExceptionMessage('É necessario informar uma descrição da categoria');

        new CategoriaValueObject(
            'categoria1',
            '',
            ['obra' => 'conto da seria']
        );
    }

    public function testListarLivros(): void
    {

       $entity = new CategoriaValueObject(
            'usuario1',
            '24/11/1998',
            ['livro' => 'teste']
        );

        $this->assertEquals(['livro' => 'teste'], $entity->listarLivros());
    }
}
