<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Pessoa;
use App\Entity\FotoPessoa;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PessoaFixtures extends Fixture implements FixtureGroupInterface
{
    public const PESSOA_REFERENCE = 'pessoa-';
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('pt_BR');

        // Cria 50 pessoas com uma foto para cada uma
        for ($i = 1; $i <= 50; $i++) {
            $pessoa = new Pessoa();
            $pessoa->setPesNome($faker->name);
            $pessoa->setPesDataNascimento($faker->dateTimeBetween('-60 years', '-20 years'));
            $pessoa->setPesSexo($faker->randomElement(['M', 'F']));
            $pessoa->setPesMae($faker->name('female'));
            $pessoa->setPesPai($faker->name('male'));

            // Cria a foto para a pessoa
            $foto = new FotoPessoa();
            $foto->setFtData(new \DateTime());
            $foto->setFtBucket('my-bucket');
            $foto->setDtHash('hash_' . $i);
            $foto->setUrl($faker->imageUrl(640, 480, 'people'));
            $foto->setPessoa($pessoa);
            $pessoa->setFoto($foto);

            $manager->persist($foto);
            $manager->persist($pessoa);

            $this->addReference(self::PESSOA_REFERENCE . $i, $pessoa);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return [
            'pessoas',
            'api-php',
        ];
    }

}