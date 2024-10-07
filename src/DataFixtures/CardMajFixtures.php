<?php

namespace App\DataFixtures;

use App\Entity\CardMaj;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CardMajFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 22 ; $i++){
            $cardMaj = new CardMaj();
            $cardMaj->setName ("cardMaj".$i);
            $cardMaj->setNumber(rand(0, 22));
            $cardMaj->setDescription("gnfjlqglùnh");
            $manager->persist ($cardMaj);
        }
        $manager->flush();
    }
}
