<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Voyage;

class VoyageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void 
    {

        $voyage = new Voyage();
        $manager->persist($voyage);
        $manager->flush();
    }
}
