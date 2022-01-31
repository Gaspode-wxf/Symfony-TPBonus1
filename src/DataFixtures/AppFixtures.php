<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
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
            for($ii=0; $ii<5; $ii++)
            {
                $produit = new Produit();
                $produit->setLibelle($categorie->getLibelle().' '.$ii)
                    ->setPrix($ii*rand(1,10))
                    ->setReference('PR'.'00'.$ii)
                    ->setCategorie($categorie)
                    ->setStock(rand(10,100));
                $manager->persist($produit);

            }
            $manager->persist($categorie);
        }
        $manager->flush();
    }
}
