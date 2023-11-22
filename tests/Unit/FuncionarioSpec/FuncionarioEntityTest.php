<?php

namespace Tests\Unit\FuncionarioSpec;

use App\Domain\Entities\FuncionarioEntity;
use App\Domain\Exceptions\FuncionarioEntityException;
use PHPUnit\Framework\TestCase;

class FuncionarioEntityTest extends TestCase
{

    public function testIdEmpty(): void
    {
        $this->expectException(FuncionarioEntityException::class);
        $this->expectExceptionMessage('Nenhum funcionário encontrado para o ID');

        new FuncionarioEntity(
            '',
            'Funcionario 1',
            'Adminstrador'
        );
    }

    public function testNomeEmpty(): void
    {
        $this->expectException(FuncionarioEntityException::class);
        $this->expectExceptionMessage('Nenhum funcionário encontrado para o nome');

        new FuncionarioEntity(
            '1',
            '',
            'Adminstrador'
        );
    }

    public function testCargoEmpty(): void
    {
        $this->expectException(FuncionarioEntityException::class);
        $this->expectExceptionMessage('Nenhum funcionário encontrado para o cargo');

        new FuncionarioEntity(
            '1',
            'Funcionario 1',
            ''
        );
    }
}
