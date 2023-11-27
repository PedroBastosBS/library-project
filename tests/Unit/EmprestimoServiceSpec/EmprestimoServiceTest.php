<?php

namespace Tests\Unit\EmprestimoServiceSpec;

use App\Core\Mappers\EmprestimoMapper;
use App\Core\Services\EmprestimoService;
use App\Domain\Entities\UsuarioEntity;
use App\Core\Repositories\EmprestimoRepository;
use App\Domain\ValueObjects\EmprestimoValueObject;
use App\Domain\ValueObjects\LivroValueObject;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmprestimoServiceTest extends TestCase
{

    use DatabaseTransactions;

    public function testRealizarEmprestimo(): void
    {
       $livro = new LivroValueObject("livro1", "isbn1");
       $usuario = new UsuarioEntity("1","usuario1","rua1-n23, lote 3", ["livro1", "livro2"]);
       $emprestimo = new EmprestimoValueObject(
            '09/12/2023',
            '11/12/2023',
            $livro,
            $usuario
        );

       $dto = EmprestimoMapper::toDTO($emprestimo);
       $repo = app(EmprestimoRepository::class);
       $service = new EmprestimoService($repo);
       $service->realizarEmprestimo($dto);
    }

}
