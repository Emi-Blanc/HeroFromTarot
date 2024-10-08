<?php

namespace App\DataFixtures;

use App\Entity\CardMaj;
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


        // obtenir toutes les cartes de la BD
        $cartesRep = $this->em->getRepository(CardMaj::class);
        $cartes = $cartesRep->findAll();


        // parcourir tous les heros
        for ($i = 0; $i < 15; $i++) {
            // obtenir l'hero
            $hero = $this->getReference('hero' . $i);

            $arrPositions = range(0, count($cartes) - 1);

            // affecter trois cartes
            for ($j = 0; $j < 3; $j++) {
                $index = array_rand($arrPositions);
                $pos = $arrPositions[$index]; // obtenir une position 
                $hero->addCard($cartes[$pos]);
                unset ($arrPositions[$index]);
            }
        }


        $manager->flush();
    }


    public function getDependencies()
    {
        return ([
            UserFixtures::class,
            CardMajFixtures::class
        ]);
    }
}
