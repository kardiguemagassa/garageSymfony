<?php

namespace App\DataFixtures;

use App\Entity\Garages;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GaragesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $garages = new Garages();
        $garages->setName('Garage Vincent Parrot');
        $garages->setEmail('contact@vparrot.fr');
        $garages->setPhone('0251999999');
        $garages->setAddress('99, Roving Street 23 456 NYC');

        $manager->persist($garages);

        $manager->flush();
    }
}
