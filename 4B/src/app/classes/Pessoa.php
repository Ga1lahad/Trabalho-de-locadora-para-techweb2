<?php

namespace app\classes;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity()]
#[Table(name: "pessoa")]
class Pessoa
{
    #[Id]
    #[Column, GeneratedValue()]
    private int $id;

    #[Column]
    private string $nome;

    #[Column]
    private string $endereco;

    #[Column]
    private string $telefone;

    #[Column]
    private bool $tipo;

    #[Column]
    private int $cpf;

    #[Column]
    private string $senha;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
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

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getTipo(): bool
    {
        return $this->tipo;
    }

    public function setTipo(bool $tipo): void
    {
        $this->tipo = $tipo;
    }

    // Getter e Setter para o cpf
    public function getCpf(): int
    {
        return $this->cpf;
    }

    public function setCpf(int $cpf): void
    {
        $this->cpf = $cpf;
    }

    // Getter e Setter para a senha
    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    function PreencherComArray(array $Dados)
    {
        $this->nome = $Dados["nome"];
        $this->endereco = $Dados["endereco"];
        $this->telefone = $Dados["telefone"];
        $this->cpf = $Dados["cpf"];
        $this->senha = $Dados["senha"];
        if (is_null($Dados["tipo"])) {
            $this->tipo = 0;
        } else {
            $this->tipo = 1;
        }
        return ($this);
    }
}
