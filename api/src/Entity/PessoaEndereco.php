<?php

namespace App\Entity;

use App\Entity\Endereco;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class PessoaEndereco
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Pessoa::class)]
    #[ORM\JoinColumn(name: 'pes_id', referencedColumnName: 'id', nullable: false)]
    private Pessoa $pessoa;

    #[ORM\ManyToOne(targetEntity: Endereco::class)]
    #[ORM\JoinColumn(name: 'end_id', referencedColumnName: 'id', nullable: false)]
    private Endereco $endereco;

    /**
     * Get the value of pessoa
     */

     public function getId(): ?int
     {
         return $this->id;
     }

     public function setId(?int $id): self
     {
         $this->id = $id;

         return $this;
     }

    public function getPessoa(): Pessoa
    {
        return $this->pessoa;
    }

    /**
     * Set the value of pessoa
     */
    public function setPessoa(Pessoa $pessoa): self
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     */
    public function setEndereco(Endereco $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }
}
