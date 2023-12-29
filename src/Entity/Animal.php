<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $nome = null;

    #[ORM\Column(nullable: true)]
    private ?float $peso = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $nascimento = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?cliente $iddono = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getPeso(): ?float
    {
        return $this->peso;
    }

    public function setPeso(?float $peso): static
    {
        $this->peso = $peso;

        return $this;
    }

    public function getNascimento(): ?\DateTimeInterface
    {
        return $this->nascimento;
    }

    public function setNascimento(?\DateTimeInterface $nascimento): static
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    public function getIddono(): ?cliente
    {
        return $this->iddono;
    }

    public function setIddono(?cliente $iddono): static
    {
        $this->iddono = $iddono;

        return $this;
    }
}
