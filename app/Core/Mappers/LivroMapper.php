<?php

namespace App\Core\Mappers;

use App\Domain\DTOS\LivroDTO;
use App\Domain\DTOS\UsuarioDTO;
use App\Domain\ValueObjects\LivroValueObject;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Collection;

final class LivroMapper
{
    static public function toDTO(LivroValueObject $livroValueObject): LivroDTO
    {
        $dto = new LivroDTO();
        $dto->titulo = $livroValueObject->getTitulo();
        $dto->isbn = $livroValueObject->getIsbn();
        $dto->categoria = $livroValueObject->categoria();
        $dto->status = $livroValueObject->status();
        $dto->autor = $livroValueObject->autor();
        return $dto;
    }

    static public function toCore(Livro $livro):LivroDTO
    {
        $dto = new LivroDTO();
        $dto->titulo = $livro->titulo;
        $dto->isbn = $livro->isbn;
        $dto->categoria = $livro->categoria;
        $dto->status = $livro->status;
        $dto->autor = $livro->autor;
        return $dto;
    }

    static public function toPresentation(Collection $livros): array
    {
        return $livros->map(fn ($livro) => self::toCore($livro))->toArray();
    }

}
