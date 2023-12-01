<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Adress;
use App\Entity\Article;
use App\Entity\Profile;
use App\Entity\Category;
use App\Entity\Tp4Bd;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // on crée un tableau vide des users pour stockage "local"
        $users = [];
        // Génération des users
        for ( $i = 0 ; $i < 50; $i++ ) {
            
            // on pass par cette instruction intermédiaire car le fakerphp ne peut pas créer directement des DataTimeImmutable
            $dateU = DateTimeImmutable::createFromMutable($faker->dateTime());
            $user = (new Tp4Bd())->setTp4Bd($faker->name())
                                ->setPassword(sha1("leMotDePasse"))
                                ->setCreatedAt($dateU)
                                ->setProfile(NULL);
            // le persist fait "l'insert" de cet user en BD 
            $manager->persist($user);

            // on veut une date de création de l'addresse différente de celle du user 
            $dateA = DateTimeImmutable::createFromMutable($faker->dateTime());
            $address = (new Adress())->setStreet($faker->streetName())
                                      ->setCodePostal($faker->postcode())
                                      ->setCity($faker->city())
                                      ->setCountry($faker->country())
                                      ->setCreatedAt($dateA)
                                      //on affecte l'user précédent à cette adress créée
                                      ->setTp4Bd($user);
            // on veut une date de création du profile différente de celle du user
            $dateP = DateTimeImmutable::createFromMutable($faker->dateTime());

            //on utilise le site picsum.photos pour générer des photos ( avec un indice afin que cette photo soit toujours la même ensuite )
            // car celle générées par fakerphph ne sont pas terribles 
            $profile = (new Profile())->setPicture("https://picsum.photos/360/360?image=".$i)
                                      // le ($i+100) permet d'avoir une photo différente du $i
                                      ->setCoverPicture("https://picsum.photos/360/360?image".($i+100))
                                      ->setDescription($faker->paragraph())
                                      ->setCreatedAt($dateP)
                                      ->setTp4Bd($user);
            $users[] = $user;
            $manager->persist($address);
            $manager->persist($profile);
            //le flush fait le "commit"
            $manager->flush();
        }
        // Génération des catégories 
        $categories = [];
        for ($i=0; $i < 5; $i++) {
            $dateC = DateTimeImmutable::createFromMutable($faker->dateTime());
            $category = (new Category())->setName($faker->sentence(2))
                                        ->setDescription($faker->paragraph())
                                        ->setImageUrl("https://picsum.photos/360/360?image=".($i+200))
                                        ->setCreatedAt($dateC);
            $categories[] = $category; // on stocke pour tirage aléatoire plus trad
            $manager->persist($category);
            $manager->flush();

            // Génération des articles 
            for ($i=0; $i <100; $i++){
                $dateArt = DateTimeImmutable::createFromMutable($faker->dateTime());
                $article = (new Article())->setTitle($faker->sentence(3))
                                          ->setContext($faker->text(80))
                                          ->setImageUrl("https://picsum.photos/360/360?image=".($i+300))
                                          ->setCreatedAt($dateArt)
                                          // tirage aléa d'un auteur / user pour cet article
                                          ->setAuthor($users[rand(0,count($users)-1)])
                                          // tirage aléatoire d'une categorie pour cet article 
                                          ->addCategory($categories[rand(0, count($categories)-1)]);
                $manager->persist($article);
                $manager->flush();
            }
        }
        
    }
}
