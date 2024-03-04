<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $boat = new Tag();
        $boat->setName('Bateau');
        $manager->persist($boat);
        $this->addReference('tag_boat', $boat);

        $airplane = new Tag();
        $airplane->setName('Avion');
        $manager->persist($airplane);
        $this->addReference('tag_airplane', $airplane);

        $parachute = new Tag();
        $parachute->setName('Parachute');
        $manager->persist($parachute);
        $this->addReference('tag_parachute', $parachute);

        $guitar = new Tag();
        $guitar->setName('Guitare');
        $manager->persist($guitar);
        $this->addReference('tag_guitar', $guitar);

        $manager->flush();
    }
}
