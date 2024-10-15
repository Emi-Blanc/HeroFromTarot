<?php

namespace App\Entity;

use App\Repository\CardMinRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardMinRepository::class)]
class CardMin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\Column(length: 255)]
    private ?string $suite2 = null;

    #[ORM\Column(length: 255)]
    private ?string $qualite = null;

    #[ORM\Column(length: 255)]
    private ?string $defaut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getSuite2(): ?string
    {
        return $this->suite2;
    }

    public function setSuite2(string $suite2): static
    {
        $this->suite2 = $suite2;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(string $qualite): static
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getDefaut(): ?string
    {
        return $this->defaut;
    }

    public function setDefaut(string $defaut): static
    {
        $this->defaut = $defaut;

        return $this;
    }
}
