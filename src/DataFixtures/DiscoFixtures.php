<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Artiste;
use App\Entity\Chanson;
use App\Entity\Type;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface as FixturesBundleFixtureGroupInterface;
use Faker\Provider\DateTime;
use DoctrineBundle\FixturesBundle\FixtureGroupInterface;

class DiscoFixtures extends Fixture implements FixturesBundleFixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['DiscoFixtures'];
    }
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');
        $typesListe = ['Musicien','Compositeur', 'Auteur', 'Interprète', 'Arrangeur'];
        for ($j = 0; $j < 5; $j++){
            $type = (new Type())->setType($typesListe[$j])
                                ->setDescription($faker->paragraph());
            $types[] = $type;
            $manager->persist($type);
            $manager->flush();
        }

        for ($i = 0; $i < 50; $i++ ){
            $dateN = DateTimeImmutable::createFromMutable($faker->dateTime());
            $artiste = (new Artiste())->setPrenom($faker->name())
                                      ->setNom($faker->name())
                                      ->setDateNaissance($dateN)
                                      ->setLieuNaissance($faker->country())
                                      ->setPhoto("https://picsum.photos/360/360?image=".$i)
                                      ->setDescription($faker->paragraph())
                                      ->settype($types[rand(0, count($types)-1)]);

            $dateS = DateTimeImmutable::createFromMutable($faker->dateTime());
            $chanson = (new Chanson())->setTitre($faker->sentence())
                                      ->setDateSortie($dateS)
                                      ->setGenre($faker->word())
                                      ->setLangue($faker->word())
                                      ->setPhotoCouverture("https://picsum.photos/360/360?image=".$i+100);

            $manager->persist($artiste);
            $manager->persist($chanson);
            $manager->flush();
        }

    }
}
