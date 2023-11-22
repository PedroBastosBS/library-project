<?php

declare(strict_types=1);

namespace App\Domain\Entities;
use App\Domain\Exceptions\FuncionarioEntityException;


final class FuncionarioEntity {
    private string $id;
    private string $nome;
    private string $cargo;
    
    public function __construct(string $id, string $nome, string $cargo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->validate($this->id,$this->nome,$this->cargo);
    }

    private function validate(string $id, string $nome, string $cargo): bool
    {
        if(strlen($id) === 0){
            throw FuncionarioEntityException::errorID();
        }
        if(strlen($nome) === 0){
            throw FuncionarioEntityException::errorNome();
        }
        if(strlen($cargo) === 0){
            throw FuncionarioEntityException::errorCargo();
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
    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): void
    {
        $this->cargo = $cargo;
    }
    
}