<?php

namespace app\classes;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Error;
use TypeError;

#[Entity()]
#[Table(name: "locacao")]
class Locacao
{
    #[Id]
    #[GeneratedValue()]
    #[Column()]
    private int $id;

    #[Column()]
    #[GeneratedValue(strategy: "AUTO")]
    private \DateTime $emissao;

    #[Column()]
    private \DateTime $devolucao;

    #[Column()]
    private float $valor;

    #[OneToOne(targetEntity: "filme", cascade: ["persist"])]
    #[JoinColumn(name: "filme_id", referencedColumnName: "id")]
    private Filme $filme;

    #[OneToOne(targetEntity: "pessoa", cascade: ["persist"])]
    #[JoinColumn(name: "cliente_id", referencedColumnName: "id")]
    private Pessoa $cliente;

    public function __construct()
    {
        $this->devolucao = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmissao(): \DateTime
    {
        return $this->emissao;
    }

    public function setEmissao(\DateTime $emissao): void
    {
        $this->emissao = $emissao;
    }

    public function getDevolucao(): \DateTime
    {
        try {
            return $this->devolucao;
        } catch (TypeError $e) {
            return null;
        }
    }

    public function setDevolucao(\DateTime $devolucao): void
    {
        $this->devolucao = $devolucao;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getCpf(): int
    {
        return $this->cpf;
    }

    public function setCpf(int $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getCliente(): Pessoa
    {
        return $this->cliente;
    }

    public function setCliente(Pessoa $cliente): void
    {
        $this->cliente = $cliente;
    }

    public function getFilme(): Filme
    {
        return $this->filme;
    }

    public function setFilme(Filme $filme): void
    {
        $this->filme = $filme;
    }
}
