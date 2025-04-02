<?php

namespace App\Entity;

use App\Entity\FotoPessoa;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PessoaRepository;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PessoaRepository::class)]
#[ApiResource]
class Pessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 200, name: 'pes_nome')]
    #[Groups(['lotacao_read'])]
    private ?string $pesNome = null;

    #[ORM\Column(type: 'date', name: 'pes_data_nascimento')]
    private ?\DateTimeInterface $pesDataNascimento = null;

    #[ORM\Column(length: 9, name: 'pes_sexo')]
    private ?string $pesSexo = null;

    #[ORM\Column(length: 200, name: 'pes_mae')]
    private ?string $pesMae = null;

    #[ORM\Column(length: 200, name: 'pes_pai', nullable: true)]
    private ?string $pesPai = null;

    #[ORM\ManyToOne(targetEntity: FotoPessoa::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'ft_id', referencedColumnName: 'id', nullable: true)]
    private ?FotoPessoa $foto = null;

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

    #[Groups(['lotacao_read'])]
    public function getIdade(): ?int
    {
        $dataNascimento = $this->getPesDataNascimento();
        if (!$dataNascimento) {
            return null;
        }
        return (new \DateTime())->diff($dataNascimento)->y;
    }

    /**
     * Get the value of foto
     */
    #[Groups(['lotacao_read'])]
    public function getFoto(): ?FotoPessoa
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     */
    public function setFoto(?FotoPessoa $foto): self
    {
        $this->foto = $foto;

        return $this;
    }
}
