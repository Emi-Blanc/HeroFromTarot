<?php

namespace App\DataFixtures;

use App\Entity\Hero;
use App\Entity\CardMaj;
use App\Entity\CardMin;
use App\Entity\CardRoy;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HeroFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // fixer trois cartes pour chaque hero
        // Obtenir toutes les cartes de la BD
        $cartesMaj = $manager->getRepository(CardMaj::class)->findAll();
        $cartesRoy = $manager->getRepository(CardRoy::class)->findAll();
        $cartesMin = $manager->getRepository(CardMin::class)->findAll();

        for ($i = 0; $i < 15; $i++) {
            $hero = new Hero();
            $hero->setName("nom" . $i);
            $manager->persist($hero);

            // rendre l'objet referençable depuis les autres fixtures
            $this->addReference('hero' . $i, $hero);

            // fixer le User
            $hero->setUser($this->getReference('user' . rand(0, 9)));

            // Assigner une carte majeure
            $indexMaj = array_rand($cartesMaj);
            $hero->setCardMaj($cartesMaj[$indexMaj]);

            // Assigner une carte royale
            $indexRoy = array_rand($cartesRoy);
            $hero->setCardRoy($cartesRoy[$indexRoy]);

            // Assigner une carte mineure
            $indexMin = array_rand($cartesMin);
            $hero->setCardMin($cartesMin[$indexMin]);
        }
        $manager->flush();
    }
}
