<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;
use App\Domain\Exceptions\LivroValueObjectException;

final class LivroValueObject
{
  private string $titulo;
  private string $isbn;
  private CategoriaValueObject $categoria;
  private AutorValueObject $autor;
  private string $status;
  public function __construct(
      string $titulo,
      string $isbn,
      CategoriaValueObject $categoria,
      string $status,
      AutorValueObject $autor
  ) {

    $this->titulo = $titulo;
    $this->isbn = $isbn;
    $this->categoria = $categoria;
    $this->status = $status;
    $this->autor = $autor;

    $this->validate($this->titulo,$this->isbn);
}
  private function validate(string $titulo, string $isbn): bool
    {
        if(strlen($titulo) === 0){
            throw LivroValueObjectException::errorTitulo();
        }
        if(strlen($isbn) === 0){
            throw LivroValueObjectException::errorIsbn();
        }
        return true;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function autor(): string
    {
        return $this->autor->getNome();
    }
    public function categoria(): string
    {
        return $this->categoria->getNome();
    }




}
