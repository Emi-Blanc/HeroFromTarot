<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Hero
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
 
    #[ORM\Column(length: 255)]
    private ?string $name = null;
 
    #[ORM\Column(length: 50)]
    private ?string $color = null;
 
    #[ORM\Column(length: 50)]
    private ?string $animal = null;
 
    #[ORM\ManyToMany(targetEntity: CardMaj::class)]
    private Collection $cards;
 
    #[ORM\ManyToOne(inversedBy: 'heros')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;
 
    public function __construct()
    {
        $this->cards = new ArrayCollection();
 
        // Liste des couleurs possibles
        $colors = ['🔴', '🔵', '🟢', '🟡', '🟣', '🟠', '🩷', '⚫', '⚪', '🩶', '🪙'];
 
        // Liste des animaux possibles
        $animals = ['🦁', '🐯', '🦅', '🦈', '🐺', '🐘', '🐻', '🐈‍⬛', '🐍', '🐬', '🐎', '🐠', '🦉', '🦌', '🦬', '🦫']; 
 
        // Attribuer une couleur et un animal aléatoires
        $this->color = $colors[array_rand($colors)];
        $this->animal = $animals[array_rand($animals)];
    }
 
    public function getId(): ?int
    {
        return $this->id;
    }
 
    public function getName(): ?string
    {
        return $this->name;
    }
 
    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }
 
    public function getColor(): ?string
    {
        return $this->color;
    }
 
    public function setColor(string $color): static
    {
        $this->color = $color;
        return $this;
    }
 
    public function getAnimal(): ?string
    {
        return $this->animal;
    }
 
    public function setAnimal(string $animal): static
    {
        $this->animal = $animal;
        return $this;
    }
 
    public function getCards(): Collection
    {
        return $this->cards;
    }
 
    public function addCard(CardMaj $card): static
    {
        if (!$this->cards->contains($card)) {
            $this->cards->add($card);
        }
        return $this;
    }
 
    public function getUser(): ?User
    {
        return $this->user;
    }
 
    public function setUser(?User $user): static
    {
        $this->user = $user;
 
        return $this;
    }
}
