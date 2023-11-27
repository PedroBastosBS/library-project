<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;
use App\Domain\Entities\UsuarioEntity;
use App\Domain\Exceptions\EmprestimoValueObjectException;

final class EmprestimoValueObject
{
  private string $dataEmprestimo;
  private string $dataDevolucao;
  private LivroValueObject $livro;
  private UsuarioEntity $usuario;

  public function __construct(string $dataEmprestimo, string $dataDevolucao, LivroValueObject $livro, UsuarioEntity $usuario) {

    $this->dataEmprestimo = $dataEmprestimo;
    $this->dataDevolucao = $dataDevolucao;
    $this->livro = $livro;
    $this->usuario = $usuario;
    $this->validate($this->dataEmprestimo, $this->dataDevolucao);
}
  private function validate(string $dataEmprestimo, string $dataDevolucao): bool
    {
        if(strlen($dataEmprestimo) === 0){
            throw EmprestimoValueObjectException::errorDataEmprestimo();
        }
        if(strlen($dataDevolucao) === 0){
            throw EmprestimoValueObjectException::errorDataDevolucao();
        }

        return true;
    }

    public function getDataEmprestimo(): string
    {
        return $this->dataEmprestimo;
    }

    public function setDataEmprestimo(string $dataEmprestimo): void
    {
        $this->dataEmprestimo = $dataEmprestimo;
    }

    public function getDataDevolucao(): string
    {
        return $this->dataDevolucao;
    }

    public function setDataDevolucao(string $dataDevolucao): void
    {
        $this->dataDevolucao = $dataDevolucao;
    }

    public function listarTitulo(): string
    {
        return $this->livro->getTitulo();
    }

    public function usuarioEmprestimo(): string
    {
        return $this->usuario->getNome();
    }

}
