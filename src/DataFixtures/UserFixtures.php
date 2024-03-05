<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setUsername('pierre');
        $admin->setEmail('pierre.jehan@gmail.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, '1234'));
        $manager->persist($admin);

        $john = new User();
        $john->setUsername('john');
        $john->setEmail('john.doe@gmail.com');
        // $john->setRoles(['ROLE_USER']);
        $john->setPassword($this->passwordHasher->hashPassword($john, '1234'));
        $manager->persist($john);

        $jane = new User();
        $jane->setUsername('jane');
        $jane->setEmail('jane.doe@gmail.com');
        $jane->setPassword($this->passwordHasher->hashPassword($jane, '1234'));
        $manager->persist($jane);

        $manager->flush();
    }
}
