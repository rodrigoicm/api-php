<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class Endereco
{
    #[ORM\Column(name: 'end_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $endId = null;

    #[ORM\Column(name: 'end_tipo_logradouro', type: 'string', length: 50, nullable: false)]
    #[Assert\NotBlank]
    private string $endTipoLogradouro;

    #[ORM\Column(name: 'end_logradouro', type: 'string', length: 200, nullable: false)]
    #[Assert\NotBlank]
    private string $endLogradouro;

    #[ORM\Column(name: 'end_numero', type: 'integer', length: 50, nullable: false)]
    #[Assert\NotBlank]
    private int $endNumero;

    #[ORM\Column(name: 'end_bairro', type: 'string', length: 100, nullable: false)]
    #[Assert\NotBlank]
    private string $endBairro;

    #[ORM\ManyToOne(targetEntity: Cidade::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'cid_id', referencedColumnName: 'cid_id', nullable: false)]
    #[Assert\NotNull]
    private ?Cidade $cidade = null;

    /**
     * Get the value of endId
     */
    public function getId(): ?int
    {
        return $this->endId;
    }

    /**
     * Set the value of endId
     */
    public function setId(?int $endId): self
    {
        $this->endId = $endId;

        return $this;
    }

    /**
     * Get the value of endTipoLogradouro
     */
    public function getEndTipoLogradouro(): string
    {
        return $this->endTipoLogradouro;
    }

    /**
     * Set the value of endTipoLogradouro
     */
    public function setEndTipoLogradouro(string $endTipoLogradouro): self
    {
        $this->endTipoLogradouro = $endTipoLogradouro;

        return $this;
    }

    /**
     * Get the value of endLogradouro
     */
    public function getEndLogradouro(): string
    {
        return $this->endLogradouro;
    }

    /**
     * Set the value of endLogradouro
     */
    public function setEndLogradouro(string $endLogradouro): self
    {
        $this->endLogradouro = $endLogradouro;

        return $this;
    }

    /**
     * Get the value of endNumero
     */
    public function getEndNumero(): string
    {
        return $this->endNumero;
    }

    /**
     * Set the value of endNumero
     */
    public function setEndNumero(string $endNumero): self
    {
        $this->endNumero = $endNumero;

        return $this;
    }

    /**
     * Get the value of endBairro
     */
    public function getEndBairro(): string
    {
        return $this->endBairro;
    }

    /**
     * Set the value of endBairro
     */
    public function setEndBairro(string $endBairro): self
    {
        $this->endBairro = $endBairro;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade(): ?Cidade
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     */
    public function setCidade(?Cidade $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }
}
