<?php

namespace App\DataFixtures;

use App\Entity\Hero;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HeroFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 15 ; $i++){
            $hero = new Hero();
            $hero->setName("nom" . $i);
            $manager->persist ($hero);
            
            // rendre l'objet referençable depuis les autres fixtures
            $this->addReference('hero' . $i, $hero);

            // fixer le User
            $hero->setUser ($this->getReference('user' . rand(0,9)));
        }
        $manager->flush();
    }
}
