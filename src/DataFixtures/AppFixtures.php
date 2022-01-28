<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {



        $categorieNames = ['Outil','Sport','Loisirs','Information','Alimentation','Autre'];
        foreach ($categorieNames as $categorieName)
        {
            $categorie = new Categorie();
            $categorie->setLibelle($categorieName);
            $manager->persist($categorie);
        }
        $manager->flush();
    }
}
