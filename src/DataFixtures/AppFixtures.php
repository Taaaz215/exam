<?php

namespace App\DataFixtures;
use App\Entity\Etudiant;
use App\Entity\ecole;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');
        // on crée 4 auteurs avec noms et prénoms "aléatoires" en français
        $etudiant = Array();
        for ($i = 0; $i < 30; $i++) {
            $etudiant[$i] = new Etudiant();
            $etudiant[$i]->setNom($faker->lastName);
            $etudiant[$i]->setPrenom($faker->firstName);
            $etudiant[$i]->setDateNaissance($faker->dateTimeBetween('+0 days', '+1 month'));
            $manager->persist($etudiant[$i]);
        }

        $ville = Array();
        for ($i = 0; $i < 30; $i++) {
            $ville[$i] = new Ville();
            $ville[$i]->setNom($faker->city);

            $manager->persist($ville[$i]);
        }

        $ecole = Array();
        for ($i = 0; $i < 30; $i++) {
            $ecole[$i] = new Ecole();
            $ecole[$i]->setNom($faker->name);
            $ecole[$i]->setAdresse($faker->address);
            $ecole[$i]->setImage($faker->name);
            $manager->persist($ecole[$i]);
        }

        $manager->flush();
    }
}
