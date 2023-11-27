<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;
use App\Domain\Exceptions\CategoriaValueObjectException;

final class CategoriaValueObject
{
  private string $nome;
  private string $descricao;
  private array $livros;

  public function __construct(string $nome, string $descricao) {

    $this->nome = $nome;
    $this->descricao = $descricao;

    $this->validate($this->nome,$this->descricao);
}
  private function validate(string $nome, string $descricao): bool
    {
        if(strlen($nome) === 0){
            throw CategoriaValueObjectException::errorNome();
        }
        if(strlen($descricao) === 0){
            throw CategoriaValueObjectException::errorDescricao();
        }

        return true;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getdescricao(): string
    {
        return $this->descricao;
    }

    public function setdescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function listarLivros(): array
    {
        return $this->livros;
    }

    public function adicionarCategoria(string $categoria): string
    {
        return $this->nome = $categoria;
    }

}
