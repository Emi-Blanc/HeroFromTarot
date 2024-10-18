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
    private Collection $cardMaj;

    #[ORM\ManyToMany(targetEntity: CardRoy::class)]
    private Collection $cardRoy;

    #[ORM\ManyToMany(targetEntity: CardMin::class)]
    private Collection $cardMin;
 
    #[ORM\ManyToOne(inversedBy: 'heros')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $yeux = null;

    #[ORM\Column(length: 255)]
    private ?string $morphologie = null;

    #[ORM\Column(length: 255)]
    private ?string $cheveux = null;
 
    // public function __construct()
    // {
    //     $this->cardMaj = new ArrayCollection();
 
    //     // Liste des couleurs possibles
    //     $colors = ['🔴', '🔵', '🟢', '🟡', '🟣', '🟠', '🩷', '⚫', '⚪', '🩶', '🪙'];
 
    //     // Liste des animaux possibles
    //     $animals = ['🦁', '🐯', '🦅', '🦈', '🐺', '🐘', '🐻', '🐈‍⬛', '🐍', '🐬', '🐎', '🐠', '🦉', '🦌', '🦬', '🦫']; 

    //     $yeux = ['🔵', '🟢', '⚫', '🟣', '🟤' ]; 

    //     $morphologie = ['V', 'A', 'H', 'O', '8'];

    //     $cheveux = ['Rasé', 'WolfCut', 'Mulet', 'Papillon', 'Court', 'Playmobil', 'Crollé', 'Paille', 'Houpette', 'Perruque', 'Chauve'];

        
 
    //     // Attribuer une couleur et un animal aléatoires
        // $this->color = $colors[array_rand($colors)];
    //     $this->animal = $animals[array_rand($animals)];
    //     $this->yeux = $yeux[array_rand($yeux)];
    //     $this->morphologie = $morphologie[array_rand($morphologie)];
    //     $this->cheveux = $cheveux[array_rand($cheveux)];
    // }
 
    public function __construct()
    {
        $this->cardMaj = new ArrayCollection();
        $this->cardRoy = new ArrayCollection();
        $this->cardMin = new ArrayCollection();

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
 
    // public function getCards(): Collection
    // {
    //     return $this->cards;
    // }
 
    public function addCardMaj(CardMaj $card): static
    {
        if (!$this->cardMaj->contains($card)) {
            $this->cardMaj->add($card);
        }
        return $this;
    }

    public function getCardMajs(): Collection
    {
        return $this->cardMaj;
    }

    public function addCardRoy(CardRoy $card): static
    {
        if (!$this->cardRoy->contains($card)) {
            $this->cardRoy->add($card);
        }
        return $this;
    }

    public function getCardRoys(): Collection
    {
        return $this->cardRoy;
    }

    public function addCardMin(CardMin $card): static
    {
        if (!$this->cardMin->contains($card)) {
            $this->cardMin->add($card);
        }
        return $this;
    }
    
    public function getCardMins(): Collection
    {
        return $this->cardMin;
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
}
