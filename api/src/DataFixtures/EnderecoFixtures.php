<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Cidade;
use App\Entity\Endereco;
use App\DataFixtures\CidadeFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EnderecoFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{

    public const ENDERECO_REFERENCE = 'endereco-';
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('pt_BR');

        // Criando 50 endereços
        for ($i = 1; $i <= 50; $i++) {
            $endereco = new Endereco();
            $endereco->setEndTipoLogradouro($faker->streetSuffix);
            $endereco->setEndLogradouro($faker->streetName);
            $endereco->setEndNumero($faker->buildingNumber);
            $endereco->setEndBairro($faker->citySuffix);

            // Associando a uma cidade existente
            $cidadeReferenceIndex = $faker->numberBetween(1, 10);
            $cidade = $this->getReference(CidadeFixtures::CIDADE_REFERENCE . $cidadeReferenceIndex, Cidade::class);
            $endereco->setCidade($cidade);

            $manager->persist($endereco);

            $this->addReference(self::ENDERECO_REFERENCE . $i, $endereco);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CidadeFixtures::class,
        ];
    }

    public static function getGroups(): array
    {
        return [
            'enderecos',
            'api-php',
        ];
    }

}