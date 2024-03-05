<?php

namespace App\DataFixtures;

use App\Entity\Wish;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\CategoryFixtures;

class WishFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $wish1 = new Wish();
        $wish1->setTitle('Saut en parachute');
        $wish1->setDescription('Faire un saut en parachute au moins une fois dans sa vie');
        $wish1->setAuthor($this->getReference('user_pierre'));
        $wish1->setIsPublished(true);
        $wish1->setCreatedAt(new \DateTimeImmutable('2024-01-01 12:00:00'));
        $wish1->setCategory($this->getReference('category_travel_and_adventure'));
        $wish1->addTag($this->getReference('tag_airplane'));
        $wish1->addTag($this->getReference('tag_parachute'));
        $manager->persist($wish1);

        $wish2 = new Wish();
        $wish2->setTitle('Aller à la montagne');
        $wish2->setAuthor($this->getReference('user_john'));
        $wish2->setIsPublished(true);
        $wish2->setCreatedAt(new \DateTimeImmutable('2024-01-02 12:00:00'));
        $wish2->setCategory($this->getReference('category_travel_and_adventure'));
        $manager->persist($wish2);

        $wish3 = new Wish();
        $wish3->setTitle('Apprendre à jouer de la guitare');
        $wish3->setDescription('Pour pouvoir enfin jouer "Hotel California" à la guitare');
        $wish3->setAuthor($this->getReference('user_pierre'));
        $wish3->setIsPublished(true);
        $wish3->setCreatedAt(new \DateTimeImmutable('2024-01-02 09:30:00'));
        $wish3->setCategory($this->getReference('category_entertainment'));
        $wish3->addTag($this->getReference('tag_guitar'));
        $manager->persist($wish3);

        $wish4 = new Wish();
        $wish4->setTitle('Partir en vacances');
        $wish4->setDescription('Partir en vacances au moins une fois par an');
        $wish4->setAuthor($this->getReference('user_pierre'));
        $wish4->setIsPublished(false);
        $wish4->setCreatedAt(new \DateTimeImmutable('2024-01-03 12:00:00'));
        $wish4->setCategory($this->getReference('category_travel_and_adventure'));
        $manager->persist($wish4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            TagFixtures::class,
            UserFixtures::class
        ];
    }
}
