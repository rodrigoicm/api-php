<?php

namespace App\DataFixtures;

use App\Entity\Cidade;
use App\Entity\Unidade;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CidadeFixtures extends Fixture
{
    public const CIDADE_REFERENCE = 'cidade-';
    public function load(ObjectManager $manager): void
    {
        // Criando 10 cidades
        for ($i = 1; $i <= 10; $i++) {
            $cidade = new Cidade();
            $cidade->setCidNome('Cidade ' . $i);
            $cidade->setCodUf('UF');
            $manager->persist($cidade);

            $this->addReference(self::CIDADE_REFERENCE . $i, $cidade);
        }

        $manager->flush();
    }
}
