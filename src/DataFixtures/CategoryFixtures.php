<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $travelAndAdventure = new Category();
        $travelAndAdventure->setName('Voyages et aventures');
        $manager->persist($travelAndAdventure);
        $this->addReference('category_travel_and_adventure', $travelAndAdventure);

        $sports = new Category();
        $sports->setName('Sports');
        $manager->persist($sports);
        $this->addReference('category_sports', $sports);

        $entertainment = new Category();
        $entertainment->setName('Loisirs');
        $manager->persist($entertainment);
        $this->addReference('category_entertainment', $entertainment);

        $humanRelations = new Category();
        $humanRelations->setName('Relations humaines');
        $manager->persist($humanRelations);
        $this->addReference('category_human_relations', $humanRelations);

        $others = new Category();
        $others->setName('Autres');
        $manager->persist($others);
        $this->addReference('category_others', $others);

        $manager->flush();
    }
}
