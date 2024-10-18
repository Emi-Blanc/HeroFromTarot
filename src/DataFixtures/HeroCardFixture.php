<?php

namespace App\DataFixtures;

use App\Entity\CardMaj;
use App\Entity\CardMin;
use App\Entity\CardRoy;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class HeroCardFixture extends Fixture implements DependentFixtureInterface
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function load(ObjectManager $manager): void
    {
        // Obtenir toutes les cartes de la BD
        $cartesMaj = $this->em->getRepository(CardMaj::class)->findAll();
        $cartesRoy = $this->em->getRepository(CardRoy::class)->findAll();
        $cartesMin = $this->em->getRepository(CardMin::class)->findAll();

        // Parcourir tous les héros
        for ($i = 0; $i < 15; $i++) {
            // Obtenir l'héro
            $hero = $this->getReference('hero' . $i);

            // Assigner une carte majeure
            $indexMaj = array_rand($cartesMaj);
            $hero->addCardMaj($cartesMaj[$indexMaj]);

            // Assigner une carte royale
            $indexRoy = array_rand($cartesRoy);
            $hero->addCardRoy($cartesRoy[$indexRoy]);

            // Assigner une carte mineure
            $indexMin = array_rand($cartesMin);
            $hero->addCardMin($cartesMin[$indexMin]);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CardMajFixtures::class,
            CardRoyFixture::class,
            CardMinFixture::class,
        ];
    }
}