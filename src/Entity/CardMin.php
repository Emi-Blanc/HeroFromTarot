<?php

namespace App\Entity;

use App\Repository\CardMinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(length: 255)]
    private ?string $image3 = null;

    /**
     * @var Collection<int, Hero>
     */
    #[ORM\OneToMany(targetEntity: Hero::class, mappedBy: 'cardMin', orphanRemoval: true)]
    private Collection $heroes;

    public function __construct()
    {
        $this->heroes = new ArrayCollection();
    }

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

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * @return Collection<int, Hero>
     */
    public function getHeroes(): Collection
    {
        return $this->heroes;
    }

    public function addHero(Hero $hero): static
    {
        if (!$this->heroes->contains($hero)) {
            $this->heroes->add($hero);
            $hero->setCardMin($this);
        }

        return $this;
    }

    public function removeHero(Hero $hero): static
    {
        if ($this->heroes->removeElement($hero)) {
            // set the owning side to null (unless already changed)
            if ($hero->getCardMin() === $this) {
                $hero->setCardMin(null);
            }
        }

        return $this;
    }
}
