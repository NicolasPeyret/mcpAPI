<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Unit;
use App\Entity\Recipe;
use App\Entity\Season;
use DateTimeInterface;
use App\Entity\Customer;
use App\Entity\Categorie;
use App\Entity\Equipment;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

// use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        //-- Création des saisons
        $seasons = [
            [
                "SeasonName" => 'test_Printemps',
                "StartDate" => '2022-03-20',
                "EndDate"  => '2022-06-21'
            ],
            [
                "SeasonName" => 'test_Eté',
                "StartDate" => '2022-06-22',
                "EndDate"  => '2022-09-22'
            ],
            [
                "SeasonName" => 'test_Automne',
                "StartDate" => '2022-09-23',
                "EndDate"  => '2022-12-20'
            ],
            [
                "SeasonName" => 'test_Hiver',
                "StartDate" => '2022-12-21',
                "EndDate"  => '2022-03-19'
            ],
        ];

        foreach ($seasons as $season) {
            // var_dump($season);
            $season_obj = new Season();
            $season_obj->setSeasonName($season['SeasonName'])
                ->setSeasonStartDate(new \DateTimeImmutable($season['StartDate']))
                ->setSeasonEndDate(new \DateTimeImmutable($season['EndDate']))
                ->setSeasonDateAdd(new \DateTimeImmutable());
            $manager->persist($season_obj);
        }
        //-- -- -- -- --/

        //-- Création des unités
        $units = array(
            "Millilitre" => "mL",
            "Centilitre" => "cL",
            "Décilitre" => "dL",
            "Litre" => "L",
            "Décalitre" => "daL",
            "Héctolitre" => "hL",

            "Milligramme" => "mG",
            "Centigramme" => "cG",
            "Décigramme" => "dG",
            "Gramme" => "G",
            "Décagramme" => "daG",
            "Héctogramme" => "hG",
            "Kilogramme" => "kG",
            "Tonne" => "T",

            "cuillère à café" => "cac",
            "cuillère à soupe" => "cas",
            "zeste" => "zst",
            "pincée" => "pincée",
            "morceau" => "morceau",
        );

        foreach ($units as $name => $notation) {
            $unit = new Unit();
            $unit->setUnitName($name)
                ->setUnitNotation($notation)
                ->setUnitDateAdd(new \DateTimeImmutable());

            $manager->persist($unit);
        }
        //-- -- -- -- --/

        //-- Gestion des catégories
        $cats = array(
            array(
                "name"        => "Fruits",
                "slug"        => "fruits",
                "description" => "Les bonnes oranges !",
                "icon"        => "fas fa-apple-alt",
                "id_parent"   => null,
                "order"       => 5,
                "is_active"   => true
            ),
            array(
                "name"        => "Légumes",
                "slug"        => "legumes",
                "description" => "Les bons poireaux !",
                "icon"        => "fas fa-carrot",
                "id_parent"   => null,
                "order"       => 5,
                "is_active"   => true
            ),
            array(
                "name"        => "Fruits à coques",
                "slug"        => "fruits-coques",
                "description" => null,
                "icon"        => null,
                "id_parent"   => 1,
                "order"       => 50,
                "is_active"   => true
            )
        );

        foreach ($cats as $key => $oneCategory) {
            $cat = new Categorie();
            $cat->setCatName($oneCategory["name"])
                ->setCatSlug($oneCategory["slug"])
                ->setCatDescription($oneCategory["description"])
                ->setCatIcon($oneCategory["icon"])
                ->setCatIdParent($oneCategory["id_parent"])
                ->setCatOrder($oneCategory["order"])
                ->setCatIsActive($oneCategory["is_active"])
                ->setCatDateAdd(new \DateTimeImmutable())
                ->setCatDateUpd(new \DateTimeImmutable());

            $manager->persist($cat);
        }
        //-- -- -- -- --/

        //-- Création des utilisateurs
        $customers = array(
            array(
                "firstname"       => "Quentin",
                "lastname"        => "Bardin",
                "restaurant_name" => "MCP",
                "email"           => "u1@email.com",
                "password"        => '$2y$10$c.Bw8hzZ8aWAmYQQyLpEJO1rr0H3Soc8GeA41ksh3gClwmKt85qqO',
                "role"            => ['ROLE_USER'],
            ),
            array(
                "firstname"       => "Thomas",
                "lastname"        => "Delphin",
                "restaurant_name" => "MCP",
                "email"           => "a1@email.com",
                "password"        => '$2y$10$c.Bw8hzZ8aWAmYQQyLpEJO1rr0H3Soc8GeA41ksh3gClwmKt85qqO',
                "role"            => ['ROLE_USER', 'ROLE_ADMIN'],
            )
        );

        //$passwordHasher = new UserPasswordHasherInterface();
        foreach ($customers as $key => $oneCustomer) {
            $customer = new Customer();

            // $hashedPassword = $passwordHasher->hashPassword(
            //     $customer,
            //     $oneCustomer["password"]
            // );

            $customer->setCustFirstname($oneCustomer["firstname"])
                ->setCustLastname($oneCustomer["lastname"])
                ->setCustRestaurantName($oneCustomer["restaurant_name"])
                ->setEmail($oneCustomer["email"])
                ->setPassword($oneCustomer["password"])
                ->setRoles($oneCustomer['role'])
                ->setCustHasValid(true)
                ->setCustActive(true)
                ->setCustDateAdd(new \DateTimeImmutable())
                ->setCustDateUpd(new \DateTimeImmutable());

            $manager->persist($customer);
        }
        //-- -- -- -- --/

        // FIXME
        // //-- Création des équipments
        // $equipments = array(
        //     "Fouet"
        // );

        // foreach ($equipments as $key => $name) {
        //     $equipment = new Equipment();
        //     $equipment->setEqName($name);

        //     $manager->persist($equipment);
        // }


        // WIP
        for ($i = 0; $i < 30; $i++) {
            $recipe = new Recipe();
            $recipe->setRecName('Nom de recette')
                ->setRecSlug('slug')
                ->setRecSource('source')
                ->setRecDescription('Description de la recette')
                ->setRecPreparationTime(new \DateTimeImmutable())
                ->setRecSleepTime(new \DateTimeImmutable())
                ->setRecCookingTime(new \DateTimeImmutable())
                ->setRecSavour(2)
                ->setRecDifficulty(1)
                ->setRecStatus(true)
                ->setRecDateAdd(new \DateTimeImmutable())
                ->setRecDateUpd(new \DateTimeImmutable())
                ->setFkCust(null);
            $manager->persist($recipe);
        }

        //-- push to BDD
        $manager->flush();
    }
}
