<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;
use App\Domain\Exceptions\AutorValueObjectException;

final class AutorValueObject
{
  private string $nome;
  private string $dataNascimento;
  private array $livros;

  public function __construct(string $nome, string $dataNascimento, array $livros) {
    
    $this->nome = $nome;
    $this->dataNascimento = $dataNascimento;
    $this->livros = $livros;

    $this->validate($this->nome,$this->dataNascimento, $this->livros);
}
  private function validate(string $nome, string $dataNascimento, array $livros): bool
    {
        if(strlen($nome) === 0){
            throw AutorValueObjectException::errorNome();
        }
        if(strlen($dataNascimento) === 0){
            throw AutorValueObjectException::errorData();
        }
        if(count($livros) === 0){
            throw AutorValueObjectException::errorLivro();
        }
        return true;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->id = $nome;
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(string $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function listarLivros(): array
    {
        return $this->livros;
    }
}
