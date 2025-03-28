<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class ServidorTemporario
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Pessoa::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'pes_id', referencedColumnName: 'pes_id', nullable: false)]
    private Pessoa $pessoa;

    #[ORM\Column(name: 'st_data_admissao', type: 'date', nullable: false)]
    private \DateTimeInterface $stDataAdmissao;

    #[ORM\Column(name: 'st_data_demissao', type: 'date', nullable: true)]
    private ?DateTimeInterface $stDataDemissao = null;

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
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
     * Get the value of stDataAdmissao
     */
    public function getStDataAdmissao(): \DateTimeInterface
    {
        return $this->stDataAdmissao;
    }

    /**
     * Set the value of stDataAdmissao
     */
    public function setStDataAdmissao(\DateTimeInterface $stDataAdmissao): self
    {
        $this->stDataAdmissao = $stDataAdmissao;

        return $this;
    }

    /**
     * Get the value of stDataDemissao
     */
    public function getStDataDemissao(): ?DateTimeInterface
    {
        return $this->stDataDemissao;
    }

    /**
     * Set the value of stDataDemissao
     */
    public function setStDataDemissao(?DateTimeInterface $stDataDemissao): self
    {
        $this->stDataDemissao = $stDataDemissao;

        return $this;
    }

}
