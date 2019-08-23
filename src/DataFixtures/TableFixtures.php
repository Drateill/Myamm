<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\Meals;
use App\Entity\Tables;
use App\Entity\MealsType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TableFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=1; $i<=30 ; $i++){
            $table=New Tables();
            $table->settableNumber($i);
            $manager->persist($table);
        }
        $Role_Admin=New Role();
        $Role_Admin->setTitle('Admin');
        $manager->persist($Role_Admin);
        $Role_User=New Role();
        $Role_User->setTitle('User');
        $manager->persist($Role_User);


        for ($j=1; $j<=5 ; $j++){
            $mealtype=New MealsType();
            $mealtype->setGenre($faker->word());
            for ($k=1; $k<=5; $k++){
                $meal=New Meals();
                $meal->setName($faker->sentence())
                     ->setDescription($faker->sentence(10))
                     ->setPrice($faker->randomDigit())
                     ->setMealsType($mealtype);
            $manager->persist($meal);
            $manager->persist($mealtype);
            }
            $manager->persist($meal);
            $manager->persist($mealtype);
        }


        $manager->flush();
    }
}
