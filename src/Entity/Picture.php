<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Picture
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'picture')]
#[ORM\UniqueConstraint(name: 'AK_Picture', columns: ['FK_tec_id'])]
#[ORM\Entity]
class Picture
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'pic_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $picId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'pic_name', type: 'string', length: 255, nullable: true)]
    private $picName;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'pic_url', type: 'string', length: 255, nullable: true)]
    private $picUrl;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'pic_date_add', type: 'datetime', nullable: true)]
    private $picDateAdd;

    /**
     * @var \Technical
     */
    #[ORM\ManyToOne(targetEntity: 'Technical')]
    #[ORM\JoinColumn(name: 'FK_tec_id', referencedColumnName: 'tec_id')]
    private $fkTec;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'Recipe', mappedBy: 'fkPic')]
    private $fkRec;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fkRec = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getPicId(): ?int
    {
        return $this->picId;
    }

    public function getPicName(): ?string
    {
        return $this->picName;
    }

    public function setPicName(?string $picName): self
    {
        $this->picName = $picName;

        return $this;
    }

    public function getPicUrl(): ?string
    {
        return $this->picUrl;
    }

    public function setPicUrl(?string $picUrl): self
    {
        $this->picUrl = $picUrl;

        return $this;
    }

    public function getPicDateAdd(): ?\DateTimeInterface
    {
        return $this->picDateAdd;
    }

    public function setPicDateAdd(?\DateTimeInterface $picDateAdd): self
    {
        $this->picDateAdd = $picDateAdd;

        return $this;
    }

    public function getFkTec(): ?Technical
    {
        return $this->fkTec;
    }

    public function setFkTec(?Technical $fkTec): self
    {
        $this->fkTec = $fkTec;

        return $this;
    }

    /**
     * @return Collection|Recipe[]
     */
    public function getFkRec(): Collection
    {
        return $this->fkRec;
    }

    public function addFkRec(Recipe $fkRec): self
    {
        if (!$this->fkRec->contains($fkRec)) {
            $this->fkRec[] = $fkRec;
            $fkRec->addFkPic($this);
        }

        return $this;
    }

    public function removeFkRec(Recipe $fkRec): self
    {
        if ($this->fkRec->removeElement($fkRec)) {
            $fkRec->removeFkPic($this);
        }

        return $this;
    }
}
