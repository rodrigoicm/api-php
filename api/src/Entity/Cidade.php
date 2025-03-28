<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class Cidade
{
    #[ORM\Id]
    #[ORM\Column(name: 'cid_id', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $cidId = null;

    #[ORM\Column(name: 'cid_nome', type: 'string', length: 200, nullable: false)]
    #[Assert\NotBlank]
    private string $cidNome;

    #[ORM\Column(name: 'cod_uf', type: 'string', length: 2, nullable: false)]
    #[Assert\NotBlank]
    private string $codUf;

    /**
     * Get the value of cidId
     */
    public function getId(): ?int
    {
        return $this->cidId;
    }

    /**
     * Set the value of cidId
     */
    public function setId(?int $cidId): self
    {
        $this->cidId = $cidId;

        return $this;
    }

    /**
     * Get the value of cidNome
     */
    public function getCidNome(): string
    {
        return $this->cidNome;
    }

    /**
     * Set the value of cidNome
     */
    public function setCidNome(string $cidNome): self
    {
        $this->cidNome = $cidNome;

        return $this;
    }

    /**
     * Get the value of codUf
     */
    public function getCodUf(): string
    {
        return $this->codUf;
    }

    /**
     * Set the value of codUf
     */
    public function setCodUf(string $codUf): self
    {
        $this->codUf = $codUf;

        return $this;
    }
}
