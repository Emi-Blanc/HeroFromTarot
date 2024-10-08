<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
         $this->passwordHasher = $passwordHasher;
    }
    
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10 ; $i++){
            $user = new User();
            $user->setUsername ("user".$i."@lala.com");
            $user->setPseudo ("user".$i);
            $user->setPassword($this->passwordHasher->hashPassword(
                 $user,
                 'a'
             ));
            $manager->persist ($user);
            // rendre l'objet refrençable depuis les autres fixtures
            $this->addReference('user' . $i, $user);
        }
        $manager->flush();
    }
}