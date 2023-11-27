<?php
declare(strict_types=1);

namespace App\Core\Mappers;

use App\Domain\DTOS\UsuarioDTO;
use App\Domain\Entities\UsuarioEntity;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;

final class UsuarioMapper
{
    static public function toDTO(string $nome, string $endereco): UsuarioDTO
    {
        $dto = new UsuarioDTO();
        $dto->nome = $nome;
        $dto->endereco = $endereco;
        return $dto;
    }
    static public function toCore(Usuario $usuario):UsuarioDTO
    {
        $dto = new UsuarioDTO();
        $dto->id = (string) $usuario->id;
        $dto->nome = $usuario->nome;
        $dto->endereco = $usuario->endereco;
        $dto->historico = $usuario->emprestimoID;
        return $dto;
    }
    static public function toPresentation(Collection $usuarios): array
    {
        return $usuarios->map(fn ($usuario) => self::toCore($usuario))->toArray();
    }
}
