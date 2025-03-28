<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class Lotacao
{
    #[ORM\Id]
    #[ORM\Column(name: 'lot_id', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $lotId = null;

    #[ORM\ManyToOne(targetEntity: Pessoa::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'pes_id', referencedColumnName: 'pes_id', nullable: false)]
    private Pessoa $pessoa;

    #[ORM\ManyToOne(targetEntity: Unidade::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'unid_id', referencedColumnName: 'unid_id', nullable: false)]
    private int $unidId;

    #[ORM\Column(name: 'lot_data_lotacao', type: 'date', nullable: false)]
    private \DateTimeInterface $lotDataLotacao;

    #[ORM\Column(name: 'lot_data_remocao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $lotDataRemocao = null;

    #[ORM\Column(name: 'lot_portaria', type: 'string', length: 100, nullable: true)]
    private ?string $lotPortaria = null;

    public function getId(): ?int
    {
        return $this->lotId;
    }

    public function setId(?int $lotId): self
    {
        $this->lotId = $lotId;

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
     * Get the value of unidId
     */
    public function getUnidId(): int
    {
        return $this->unidId;
    }

    /**
     * Set the value of unidId
     */
    public function setUnidId(int $unidId): self
    {
        $this->unidId = $unidId;

        return $this;
    }

    /**
     * Get the value of lotDataLotacao
     */
    public function getLotDataLotacao(): \DateTimeInterface
    {
        return $this->lotDataLotacao;
    }

    /**
     * Set the value of lotDataLotacao
     */
    public function setLotDataLotacao(\DateTimeInterface $lotDataLotacao): self
    {
        $this->lotDataLotacao = $lotDataLotacao;

        return $this;
    }

    /**
     * Get the value of lotDataRemocao
     */
    public function getLotDataRemocao(): ?\DateTimeInterface
    {
        return $this->lotDataRemocao;
    }

    /**
     * Set the value of lotDataRemocao
     */
    public function setLotDataRemocao(?\DateTimeInterface $lotDataRemocao): self
    {
        $this->lotDataRemocao = $lotDataRemocao;

        return $this;
    }

    /**
     * Get the value of lotPortaria
     */
    public function getLotPortaria(): ?string
    {
        return $this->lotPortaria;
    }

    /**
     * Set the value of lotPortaria
     */
    public function setLotPortaria(?string $lotPortaria): self
    {
        $this->lotPortaria = $lotPortaria;

        return $this;
    }
}
