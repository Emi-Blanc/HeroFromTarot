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
 

    #[ORM\ManyToOne(inversedBy: 'heros')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $yeux = null;

    #[ORM\Column(length: 255)]
    private ?string $morphologie = null;

    #[ORM\Column(length: 255)]
    private ?string $cheveux = null;

    #[ORM\ManyToOne(inversedBy: 'heroes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CardMaj $cardMaj = null;

    #[ORM\ManyToOne(inversedBy: 'heroes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CardRoy $cardRoy = null;

    #[ORM\ManyToOne(inversedBy: 'heroes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CardMin $cardMin = null;
 
    
    public function __construct()
    {

        $colors = ['🔴', '🔵', '🟢', '🟡', '🟣', '🟠', '🩷', '⚫', '⚪', '🩶', '🪙'];
        $this->color = $colors[array_rand($colors)];
        $animals = ['🦁', '🐯', '🦅', '🦈', '🐺', '🐘', '🐻', '🐈‍⬛', '🐍', '🐬', '🐎', '🐠', '🦉', '🦌', '🦬', '🦫'];
        $this->animal = $animals[array_rand($animals)];
        $yeux = ['🔵', '🟢', '⚫', '🟣', '🟤' ]; 
        $this->yeux = $yeux[array_rand($yeux)];
        $morphologie = ['V', 'A', 'H', 'O', '8'];
        $this->morphologie = $morphologie[array_rand($morphologie)];
        $cheveux = ['Rasé', 'WolfCut', 'Mulet', 'Papillon', 'Court', 'Playmobil', 'Crollé', 'Paille', 'Houpette', 'Perruque', 'Chauve'];
        $this->cheveux = $cheveux[array_rand($cheveux)];

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
 
    
 
    public function getUser(): ?User
    {
        return $this->user;
    }
 
    public function setUser(?User $user): static
    {
        $this->user = $user;
 
        return $this;
    }

    public function getYeux(): ?string
    {
        return $this->yeux;
    }

    public function setYeux(string $yeux): static
    {
        $this->yeux = $yeux;

        return $this;
    }

    public function getMorphologie(): ?string
    {
        return $this->morphologie;
    }

    public function setMorphologie(string $morphologie): static
    {
        $this->morphologie = $morphologie;

        return $this;
    }

    public function getCheveux(): ?string
    {
        return $this->cheveux;
    }

    public function setCheveux(string $cheveux): static
    {
        $this->cheveux = $cheveux;

        return $this;
    }

    public function getCardMaj(): ?CardMaj
    {
        return $this->cardMaj;
    }

    public function setCardMaj(?CardMaj $cardMaj): static
    {
        $this->cardMaj = $cardMaj;

        return $this;
    }

    public function getCardRoy(): ?CardRoy
    {
        return $this->cardRoy;
    }

    public function setCardRoy(?CardRoy $cardRoy): static
    {
        $this->cardRoy = $cardRoy;

        return $this;
    }

    public function getCardMin(): ?CardMin
    {
        return $this->cardMin;
    }

    public function setCardMin(?CardMin $cardMin): static
    {
        $this->cardMin = $cardMin;

        return $this;
    }
}
