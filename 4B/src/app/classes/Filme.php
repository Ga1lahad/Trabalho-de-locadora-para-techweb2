<?php

namespace app\classes;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "filme")]
class Filme
{
    #[Id]
    #[Column]
    #[GeneratedValue]
    private int $id;

    #[Column]
    private string $nome;

    #[Column]
    private string $ano;

    #[Column]
    private int $duracao;

    #[Column]
    private string $foto;

    #[Column]
    private string $sinopse;

    #[ManyToOne(targetEntity: "Estilo", cascade: ["persist"])]
    #[JoinColumn(name: "estilo_id", referencedColumnName: "id")]
    private Estilo $estilo;

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

    public function getAno(): string
    {
        return $this->ano;
    }

    public function setAno(string $ano): void
    {
        $this->ano = $ano;
    }

    public function getDuracao(): int
    {
        return $this->duracao;
    }

    public function setDuracao(int $duracao): void
    {
        $this->duracao = $duracao;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }

    public function getSinopse(): string
    {
        return $this->sinopse;
    }

    public function setSinopse(string $sinopse): void
    {
        $this->sinopse = $sinopse;
    }

    public function getEstilo(): Estilo
    {
        return $this->estilo;
    }

    public function setEstilo(Estilo $estilo): void
    {
        $this->estilo = $estilo;
    }
}
