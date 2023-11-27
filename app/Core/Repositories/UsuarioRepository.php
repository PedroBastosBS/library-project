<?php

namespace App\Core\Repositories;

use App\Domain\DTOS\UsuarioDTO;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;

interface UsuarioRepository
{
    /**
     * Caradastra um usuario.
     * @param  UsuarioDTO  $usuarioDTO.
     * @return void;
     */
    public function create(UsuarioDTO $usuarioDTO): void;
    /**
     * lista um usuario.
     * @param  string  $id.
     * @return Usuario;
     */
    public function findByID(string $id): ?Usuario;
    /**
     * lista todos os usuarios.
     * @return Collection;
     */
    public function all(): Collection;
}
