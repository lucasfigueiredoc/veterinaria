<?php

namespace App\Entity;

use App\Repository\ConsultaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultaRepository::class)]
class Consulta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(nullable: true)]
    private ?float $valor = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?funcionario $idfuncionario = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?animal $idanimal = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?cliente $idcliente = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(?float $valor): static
    {
        $this->valor = $valor;

        return $this;
    }

    public function getIdfuncionario(): ?funcionario
    {
        return $this->idfuncionario;
    }

    public function setIdfuncionario(?funcionario $idfuncionario): static
    {
        $this->idfuncionario = $idfuncionario;

        return $this;
    }

    public function getIdanimal(): ?animal
    {
        return $this->idanimal;
    }

    public function setIdanimal(animal $idanimal): static
    {
        $this->idanimal = $idanimal;

        return $this;
    }

    public function getIdcliente(): ?cliente
    {
        return $this->idcliente;
    }

    public function setIdcliente(?cliente $idcliente): static
    {
        $this->idcliente = $idcliente;

        return $this;
    }
}
