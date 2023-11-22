<?php

declare(strict_types=1);

namespace App\Domain\Entities;
use App\Domain\Exceptions\UsuarioEntityException;


final class UsuarioEntity {
    private string $id;
    private string $nome;
    private string $endereco;
    private array $historicoEmprestimo = [];
    
    public function __construct(string $id, string $nome, string $endereco, array $historicoEmprestimo) {
    
        $this->id = $id;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->historicoEmprestimo = $historicoEmprestimo;

        $this->validate($this->id,$this->nome,$this->endereco);
    }

    private function validate(string $id, string $nome, string $endereco): bool
    {
        if(strlen($id) === 0){
            throw UsuarioEntityException::errorID();
        }
        if(strlen($nome) === 0){
            throw UsuarioEntityException::errorNome();
        }
        if(strlen($endereco) === 0){
            throw UsuarioEntityException::errorEndereco();
        }
        return true;
    }

    public function getID(): string
    {
        return $this->id;
    }

    public function setID(string $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }
    
}
