<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Unit
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'unit')]
#[ORM\Entity]
class Unit
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'unit_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $unitId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'unit_name', type: 'string', length: 255, nullable: true)]
    private $unitName;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'unit_notation', type: 'string', length: 50, nullable: true)]
    private $unitNotation;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'unit_date_add', type: 'datetime', nullable: true)]
    private $unitDateAdd;

    public function getUnitId(): ?int
    {
        return $this->unitId;
    }

    public function getUnitName(): ?string
    {
        return $this->unitName;
    }

    public function setUnitName(?string $unitName): self
    {
        $this->unitName = $unitName;

        return $this;
    }

    public function getUnitNotation(): ?string
    {
        return $this->unitNotation;
    }

    public function setUnitNotation(?string $unitNotation): self
    {
        $this->unitNotation = $unitNotation;

        return $this;
    }

    public function getUnitDateAdd(): ?\DateTimeInterface
    {
        return $this->unitDateAdd;
    }

    public function setUnitDateAdd(?\DateTimeInterface $unitDateAdd): self
    {
        $this->unitDateAdd = $unitDateAdd;

        return $this;
    }
}
