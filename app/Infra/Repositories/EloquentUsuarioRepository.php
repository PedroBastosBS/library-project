<?php

namespace App\Infra\Repositories;

use App\Core\Repositories\UsuarioRepository;
use App\Domain\DTOS\UsuarioDTO;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;

class EloquentUsuarioRepository implements UsuarioRepository
{
    public function create(UsuarioDTO $usuarioDTO): void
    {
        Usuario::create([
            'nome' => $usuarioDTO->nome,
            'endereco' => $usuarioDTO->endereco,
        ]);
    }

    public function findByID(string $id): ?Usuario
    {
        return Usuario::find($id);
    }

    public function all(): Collection
    {
        return Usuario::all();
    }

}
