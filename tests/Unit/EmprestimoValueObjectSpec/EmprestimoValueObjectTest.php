<?php

namespace Tests\Unit\FuncionarioSpec;


use App\Domain\Exceptions\EmprestimoValueObjectException;
use App\Domain\Exceptions\LivroValueObjectException;
use App\Domain\ValueObjects\EmprestimoValueObject;
use App\Domain\ValueObjects\LivroValueObject;
use PHPUnit\Framework\TestCase;

class EmprestimoValueObjectTest extends TestCase
{

    public function testDataEmprestimoEmpty(): void
    {
        $this->expectException(EmprestimoValueObjectException::class);
        $this->expectExceptionMessage('É necessario informar a data de emprestimo');

        new EmprestimoValueObject(
            '',
            '11/12/2023',
        );
    }

    public function testDataDevolucaoEmpty(): void
    {
        $this->expectException(EmprestimoValueObjectException::class);
        $this->expectExceptionMessage('É necessario informar a data de devolucao');

        new EmprestimoValueObject(
            '11/12/2023',
            '',
        );
    }

}
