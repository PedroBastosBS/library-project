<?php

namespace App\Domain\DTOS;

final class UsuarioDTO
{
    public string $id;

    public string $nome;
    public string $endereco;
    public ?string $historico;
}
