<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Faker\Provider\Lorem;
use Faker\Provider\DateTime;
use Faker\Provider\Image;
use Faker\Provider\Base;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $article = new BlogPost();
            $article->setTitle( Lorem::sentence());
            $article->setSubtitle( Lorem::paragraph());
            $article->setCreatedAt( DateTime::dateTime());
            $article->setAuthor( $faker->name);
            $article->setBody($faker->text);
            $article->setImage( Image::imageUrl(
                Base::numberBetween(400,800),
                Base::numberBetween(400,800)
            ));
            $manager->persist($article);
        }
        $manager->flush();
    }
}
?>