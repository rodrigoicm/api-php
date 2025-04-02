<?php

namespace App\DataFixtures;

use App\Entity\Pessoa;
use App\Entity\Endereco;
use App\Entity\PessoaEndereco;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PessoaEnderecoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $pessoas = [];
        for ($i = 1; $i <= 50; $i++) {
            $pessoa = $this->getReference(PessoaFixtures::PESSOA_REFERENCE . $i, Pessoa::class);
            $pessoas[] = $pessoa;
        }
        $enderecos = [];
        for ($i = 1; $i <= 50; $i++) {
            $endereco = $this->getReference(EnderecoFixtures::ENDERECO_REFERENCE . $i, Endereco::class);
            $enderecos[] = $endereco;
        }

        foreach ($pessoas as $pessoa) {
            $endereco = $enderecos[array_rand($enderecos)];

            $pessoaEndereco = new PessoaEndereco();
            $pessoaEndereco->setPessoa($pessoa);
            $pessoaEndereco->setEndereco($endereco);

            $manager->persist($pessoaEndereco);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PessoaFixtures::class,
            EnderecoFixtures::class,
        ];
    }
}