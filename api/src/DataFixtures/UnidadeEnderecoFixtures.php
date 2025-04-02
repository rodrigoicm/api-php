<?php

namespace App\DataFixtures;

use App\Entity\Unidade;
use App\Entity\Endereco;
use App\Entity\UnidadeEndereco;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UnidadeEnderecoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $unidade = $this->getReference(UnidadeFixtures::UNIDADE_REFERENCE . $i, Unidade::class);
            $endereco = $this->getReference(EnderecoFixtures::ENDERECO_REFERENCE . $i, Endereco::class);

            $unidadeEndereco = new UnidadeEndereco();
            $unidadeEndereco->setUnidade($unidade);
            $unidadeEndereco->setEndereco($endereco);

            $manager->persist($unidadeEndereco);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UnidadeFixtures::class,
            EnderecoFixtures::class,
        ];
    }
}