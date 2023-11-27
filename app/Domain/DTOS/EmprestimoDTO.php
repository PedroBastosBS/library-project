<?php
declare(strict_types=1);

namespace App\Domain\DTOS;

final class EmprestimoDTO
{
    public string $dataEmprestimo;
    public string $dataDevolucao;

    public string $livro;

    public string $usuario;

    public static function new(
        string $dataEmprestimo,
        string $dataDevolucao,
        string $usuario,
        string $livro
    )
    {
        $dto = new self();
        $dto->dataEmprestimo = $dataEmprestimo;
        $dto->dataDevolucao = $dataDevolucao;
        $dto->usuario = $usuario;
        $dto->livro = $livro;
        return $dto;
    }

}
