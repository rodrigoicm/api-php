<?php

namespace App\Entity;


use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Serializer\Filter\PropertyFilter;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Patch(),
        new Delete(),
        new GetCollection(
            uriTemplate: '/servidores_lotados.{_format}',
            normalizationContext: ['groups' => ['lotacao_read']]
        )
    ]
)]
#[ApiFilter(PropertyFilter::class)]
#[ApiFilter(SearchFilter::class, properties: [
    'unidade.id' => SearchFilter::STRATEGY_EXACT,
])]
class Lotacao
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Pessoa::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'pes_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['lotacao_read'])]
    private Pessoa $pessoa;

    #[ORM\ManyToOne(targetEntity: Unidade::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'unid_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['lotacao_read'])]
    private Unidade $unidade;

    #[ORM\Column(name: 'lot_data_lotacao', type: 'date', nullable: false)]
    private \DateTimeInterface $lotDataLotacao;

    #[ORM\Column(name: 'lot_data_remocao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $lotDataRemocao = null;

    #[ORM\Column(name: 'lot_portaria', type: 'string', length: 100, nullable: true)]
    private ?string $lotPortaria = null;

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
