<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PessoaRepository;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PessoaRepository::class)]
#[ApiResource]
class Pessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'pes_id', type: 'integer', nullable: false)]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 200, name: 'pes_nome')]
    #[Assert\NotBlank]
    private ?string $pesNome = null;

    #[ORM\Column(type: 'date', name: 'pes_data_nascimento')]
    private ?\DateTimeInterface $pesDataNascimento = null;

    #[ORM\Column(length: 9, name: 'pes_sexo')]
    #[Assert\NotBlank]
    private ?string $pesSexo = null;

    #[ORM\Column(length: 200, name: 'pes_mae')]
    private ?string $pesMae = null;

    #[ORM\Column(length: 200, name: 'pes_pai', nullable: true)]
    private ?string $pesPai = null;

    // public function __construct()
    // {
    //     $this->pesDataNascimento = new \DateTime();
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPesNome(): ?string
    {
        return $this->pesNome;
    }

    public function setPesNome(string $pesNome): static
    {
        $this->pesNome = $pesNome;

        return $this;
    }

    public function getPesDataNascimento(): ?\DateTimeInterface
    {
        return $this->pesDataNascimento;
    }

    public function setPesDataNascimento(\DateTimeInterface $pesDataNascimento): static
    {
        $this->pesDataNascimento = $pesDataNascimento;

        return $this;
    }

    public function getPesSexo(): ?string
    {
        return $this->pesSexo;
    }

    public function setPesSexo(string $pesSexo): static
    {
        $this->pesSexo = $pesSexo;

        return $this;
    }

    public function getPesMae(): ?string
    {
        return $this->pesMae;
    }

    public function setPesMae(string $pesMae): static
    {
        $this->pesMae = $pesMae;

        return $this;
    }

    public function getPesPai(): ?string
    {
        return $this->pesPai;
    }

    public function setPesPai(?string $pesPai): static
    {
        $this->pesPai = $pesPai;

        return $this;
    }
}
