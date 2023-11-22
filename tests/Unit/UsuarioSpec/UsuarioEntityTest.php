<?php

namespace Tests\Unit\FuncionarioSpec;

use App\Domain\Entities\UsuarioEntity;
use App\Domain\Exceptions\UsuarioEntityException;
use PHPUnit\Framework\TestCase;

class UsuarioEntityTest extends TestCase
{

    public function testIdEmpty(): void
    {
        $this->expectException(UsuarioEntityException::class);
        $this->expectExceptionMessage('Nenhum usuario encontrado para o ID');

        new UsuarioEntity(
            '',
            'Usuario 1',
            'Rua usuario1',
            ['livro' => 'teste']
        );
    }

    public function testNomeEmpty(): void
    {
        $this->expectException(UsuarioEntityException::class);
        $this->expectExceptionMessage('Nenhum usuario encontrado para o nome');

        new UsuarioEntity(
            '1',
            '',
            'Rua usuario1',
            ['livro' => 'teste']
        );
    }

    public function testEnderecoEmpty(): void
    {
        $this->expectException(UsuarioEntityException::class);
        $this->expectExceptionMessage('Nenhum usuario encontrado para o endereco');

        new UsuarioEntity(
            '1',
            'usuario1',
            '',
            ['livro' => 'teste']
        );
    }
}
