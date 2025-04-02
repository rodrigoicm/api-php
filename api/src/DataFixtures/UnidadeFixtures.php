<?php

namespace App\DataFixtures;

use App\Entity\Cidade;
use App\Entity\Unidade;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UnidadeFixtures extends Fixture
{
    public const UNIDADE_REFERENCE = 'unidade-';
    public function load(ObjectManager $manager): void
    {

        // Criando 20 unidades
        for ($i = 1; $i <= 20; $i++) {
            $unidade = new Unidade();
            $unidade->setUnidNome('Unidade ' . $i);
            $unidade->setUnidSigla('U' . $i);
            $manager->persist($unidade);

            $this->addReference(self::UNIDADE_REFERENCE . $i, $unidade);
        }

        $manager->flush();
    }

}
