<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Season
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'season')]
#[ORM\Entity]
class Season
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'season_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $seasonId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'season_name', type: 'string', length: 255, nullable: true)]
    private $seasonName;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'season_start_date', type: 'date', nullable: true)]
    private $seasonStartDate;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'season_end_date', type: 'date', nullable: true)]
    private $seasonEndDate;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'season_date_add', type: 'datetime', nullable: true)]
    private $seasonDateAdd;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'Ingredient', mappedBy: 'fkSeason')]
    private $fkIng;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fkIng = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getSeasonId(): ?int
    {
        return $this->seasonId;
    }

    public function getSeasonName(): ?string
    {
        return $this->seasonName;
    }

    public function setSeasonName(?string $seasonName): self
    {
        $this->seasonName = $seasonName;

        return $this;
    }

    public function getSeasonStartDate(): ?\DateTimeInterface
    {
        return $this->seasonStartDate;
    }

    public function setSeasonStartDate(?\DateTimeInterface $seasonStartDate): self
    {
        $this->seasonStartDate = $seasonStartDate;

        return $this;
    }

    public function getSeasonEndDate(): ?\DateTimeInterface
    {
        return $this->seasonEndDate;
    }

    public function setSeasonEndDate(?\DateTimeInterface $seasonEndDate): self
    {
        $this->seasonEndDate = $seasonEndDate;

        return $this;
    }

    public function getSeasonDateAdd(): ?\DateTimeInterface
    {
        return $this->seasonDateAdd;
    }

    public function setSeasonDateAdd(?\DateTimeInterface $seasonDateAdd): self
    {
        $this->seasonDateAdd = $seasonDateAdd;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getFkIng(): Collection
    {
        return $this->fkIng;
    }

    public function addFkIng(Ingredient $fkIng): self
    {
        if (!$this->fkIng->contains($fkIng)) {
            $this->fkIng[] = $fkIng;
            $fkIng->addFkSeason($this);
        }

        return $this;
    }

    public function removeFkIng(Ingredient $fkIng): self
    {
        if ($this->fkIng->removeElement($fkIng)) {
            $fkIng->removeFkSeason($this);
        }

        return $this;
    }
}
