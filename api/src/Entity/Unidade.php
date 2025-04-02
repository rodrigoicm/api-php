<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class Unidade
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $id = null;

    #[ORM\Column(name: 'unid_nome', type: 'string', length: 200, nullable: false)]
    #[Groups(['lotacao_read'])]
    private string $unidNome;

    #[ORM\Column(name: 'unid_sigla', type: 'string', length: 20, nullable: false)]
    private string $unidSigla;

    /**
     * Get the value of unidId
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of unidId
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of unidNome
     */
    public function getUnidNome(): string
    {
        return $this->unidNome;
    }

    /**
     * Set the value of unidNome
     */
    public function setUnidNome(string $unidNome): self
    {
        $this->unidNome = $unidNome;

        return $this;
    }

    /**
     * Get the value of unidSigla
     */
    public function getUnidSigla(): string
    {
        return $this->unidSigla;
    }

    /**
     * Set the value of unidSigla
     */
    public function setUnidSigla(string $unidSigla): self
    {
        $this->unidSigla = $unidSigla;

        return $this;
    }
}
