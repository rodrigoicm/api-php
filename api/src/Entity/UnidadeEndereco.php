<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class UnidadeEndereco
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Unidade::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'unid_id', referencedColumnName: 'id', nullable: false)]
    private Unidade $unidade;

    #[ORM\ManyToOne(targetEntity: Endereco::class)]
    #[ORM\JoinColumn(name: 'end_id', referencedColumnName: 'id', nullable: false)]
    private Endereco $endereco;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of unidade
     */
    public function getUnidade(): Unidade
    {
        return $this->unidade;
    }

    /**
     * Set the value of unidade
     */
    public function setUnidade(Unidade $unidade): self
    {
        $this->unidade = $unidade;

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
