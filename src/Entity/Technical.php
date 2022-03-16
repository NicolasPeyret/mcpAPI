<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Technical
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'technical')]
#[ORM\Index(name: 'FK_Technical_Technical', columns: ['FK_tec_id'])]
#[ORM\Entity]
class Technical
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'tec_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $tecId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'tec_name', type: 'string', length: 255, nullable: true)]
    private $tecName;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'tec_description', type: 'text', length: 65535, nullable: true)]
    private $tecDescription;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'tec_cooking_duration', type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private $tecCookingDuration;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'tec_cooking_heat', type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private $tecCookingHeat;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'tec_difficulty', type: 'integer', nullable: true)]
    private $tecDifficulty;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'tec_id_parent', type: 'integer', nullable: true)]
    private $tecIdParent;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'tec_date_add', type: 'datetime', nullable: true)]
    private $tecDateAdd;

    /**
     * @var \Technical
     */
    #[ORM\ManyToOne(targetEntity: 'Technical')]
    #[ORM\JoinColumn(name: 'FK_tec_id', referencedColumnName: 'tec_id')]
    private $fkTec;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'Equipment', inversedBy: 'fkTec')]
    #[ORM\JoinTable(name: 'rel_equipment_technical', joinColumns: [], inverseJoinColumns: [])]
    #[ORM\JoinColumn(name: 'FK_tec_id', referencedColumnName: 'tec_id')]
    #[ORM\JoinColumn(name: 'FK_eq_id', referencedColumnName: 'eq_id')]
    private $fkEq;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fkEq = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTecId(): ?int
    {
        return $this->tecId;
    }

    public function getTecName(): ?string
    {
        return $this->tecName;
    }

    public function setTecName(?string $tecName): self
    {
        $this->tecName = $tecName;

        return $this;
    }

    public function getTecDescription(): ?string
    {
        return $this->tecDescription;
    }

    public function setTecDescription(?string $tecDescription): self
    {
        $this->tecDescription = $tecDescription;

        return $this;
    }

    public function getTecCookingDuration(): ?string
    {
        return $this->tecCookingDuration;
    }

    public function setTecCookingDuration(?string $tecCookingDuration): self
    {
        $this->tecCookingDuration = $tecCookingDuration;

        return $this;
    }

    public function getTecCookingHeat(): ?string
    {
        return $this->tecCookingHeat;
    }

    public function setTecCookingHeat(?string $tecCookingHeat): self
    {
        $this->tecCookingHeat = $tecCookingHeat;

        return $this;
    }

    public function getTecDifficulty(): ?int
    {
        return $this->tecDifficulty;
    }

    public function setTecDifficulty(?int $tecDifficulty): self
    {
        $this->tecDifficulty = $tecDifficulty;

        return $this;
    }

    public function getTecIdParent(): ?int
    {
        return $this->tecIdParent;
    }

    public function setTecIdParent(?int $tecIdParent): self
    {
        $this->tecIdParent = $tecIdParent;

        return $this;
    }

    public function getTecDateAdd(): ?\DateTimeInterface
    {
        return $this->tecDateAdd;
    }

    public function setTecDateAdd(?\DateTimeInterface $tecDateAdd): self
    {
        $this->tecDateAdd = $tecDateAdd;

        return $this;
    }

    public function getFkTec(): ?self
    {
        return $this->fkTec;
    }

    public function setFkTec(?self $fkTec): self
    {
        $this->fkTec = $fkTec;

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getFkEq(): Collection
    {
        return $this->fkEq;
    }

    public function addFkEq(Equipment $fkEq): self
    {
        if (!$this->fkEq->contains($fkEq)) {
            $this->fkEq[] = $fkEq;
        }

        return $this;
    }

    public function removeFkEq(Equipment $fkEq): self
    {
        $this->fkEq->removeElement($fkEq);

        return $this;
    }
}
