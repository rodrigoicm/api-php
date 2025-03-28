<?php

namespace App\Entity;

use DateTimeInterface;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Controller\FotoUploadController;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class FotoPessoa
{
    #[ORM\Id]
    #[ORM\Column(name: 'ft_id', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Pessoa::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'pes_id', referencedColumnName: 'pes_id', nullable: false)]
    private Pessoa $pessoa;

    #[ORM\Column(name: 'ft_data', type: 'datetime', nullable: true) ]
    private ?\DateTimeInterface $ftData = null;

    #[ORM\Column(name: 'ft_bucket', type: 'string', length: 50, nullable: true)]
    private ?string $ftBucket = null;

    #[ORM\Column(name: 'dt_hash', type: 'string', length: 50, nullable: true)]
    private ?string $dtHash = null;

    #[ORM\Column(name: 'ft_url', type: 'text', nullable: true)]
    private ?string $url = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of ftId
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pessoa
     */
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
     * Get the value of ftData
     */
    public function getFtData(): ?DateTimeInterface
    {
        return $this->ftData;
    }

    /**
     * Set the value of ftData
     */
    public function setFtData(?DateTimeInterface $ftData): self
    {
        $this->ftData = $ftData;

        return $this;
    }

    /**
     * Get the value of ftBucket
     */
    public function getFtBucket(): ?string
    {
        return $this->ftBucket;
    }

    /**
     * Set the value of ftBucket
     */
    public function setFtBucket(?string $ftBucket): self
    {
        $this->ftBucket = $ftBucket;

        return $this;
    }

    /**
     * Get the value of dtHash
     */
    public function getDtHash(): ?string
    {
        return $this->dtHash;
    }

    /**
     * Set the value of dtHash
     */
    public function setDtHash(?string $dtHash): self
    {
        $this->dtHash = $dtHash;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }
}
