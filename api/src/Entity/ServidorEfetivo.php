<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class ServidorEfetivo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Pessoa::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'pes_id', referencedColumnName: 'pes_id', nullable: false)]
    private Pessoa $pessoa;

    #[ORM\Column(name: 'se_matricula', type: 'string', length: 20, nullable: false)]
    private string $seMatricula;

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
     * Get the value of seMatricula
     */
    public function getSeMatricula(): string
    {
        return $this->seMatricula;
    }

    /**
     * Set the value of seMatricula
     */
    public function setSeMatricula(string $seMatricula): self
    {
        $this->seMatricula = $seMatricula;

        return $this;
    }
}
