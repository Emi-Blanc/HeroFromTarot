<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Finder\Finder;

class CardMinFixture extends Fixture
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function load(ObjectManager $manager): void
    {

        $finder = new Finder();

        $finder->files()->in('src/DataFixtures/sql');

        $cnx = $this->em->getConnection();

        foreach ($finder as $file){
            $content = $file->getContents();
            $cnx->setAutoCommit(false);
            $cnx->executeStatement($content);
        }
        $manager->flush();
    }
}
