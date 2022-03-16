<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Equipment
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'equipment')]
#[ORM\Entity]
class Equipment
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'eq_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $eqId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'eq_name', type: 'string', length: 255, nullable: true)]
    private $eqName;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'eq_icon', type: 'string', length: 255, nullable: true)]
    private $eqIcon;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'eq_date_add', type: 'datetime', nullable: true)]
    private $eqDateAdd;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'eq_date_upd', type: 'datetime', nullable: true)]
    private $eqDateUpd;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'Technical', mappedBy: 'fkEq')]
    private $fkTec;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fkTec = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getEqId(): ?int
    {
        return $this->eqId;
    }

    public function getEqName(): ?string
    {
        return $this->eqName;
    }

    public function setEqName(?string $eqName): self
    {
        $this->eqName = $eqName;

        return $this;
    }

    public function getEqIcon(): ?string
    {
        return $this->eqIcon;
    }

    public function setEqIcon(?string $eqIcon): self
    {
        $this->eqIcon = $eqIcon;

        return $this;
    }

    public function getEqDateAdd(): ?\DateTimeInterface
    {
        return $this->eqDateAdd;
    }

    public function setEqDateAdd(?\DateTimeInterface $eqDateAdd): self
    {
        $this->eqDateAdd = $eqDateAdd;

        return $this;
    }

    public function getEqDateUpd(): ?\DateTimeInterface
    {
        return $this->eqDateUpd;
    }

    public function setEqDateUpd(?\DateTimeInterface $eqDateUpd): self
    {
        $this->eqDateUpd = $eqDateUpd;

        return $this;
    }

    /**
     * @return Collection|Technical[]
     */
    public function getFkTec(): Collection
    {
        return $this->fkTec;
    }

    public function addFkTec(Technical $fkTec): self
    {
        if (!$this->fkTec->contains($fkTec)) {
            $this->fkTec[] = $fkTec;
            $fkTec->addFkEq($this);
        }

        return $this;
    }

    public function removeFkTec(Technical $fkTec): self
    {
        if ($this->fkTec->removeElement($fkTec)) {
            $fkTec->removeFkEq($this);
        }

        return $this;
    }
}
