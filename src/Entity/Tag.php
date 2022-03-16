<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tag
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'tag')]
#[ORM\Entity]
class Tag
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'tag_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $tagId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'tag_name', type: 'string', length: 255, nullable: true)]
    private $tagName;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'tag_start_date', type: 'date', nullable: true)]
    private $tagStartDate;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'tag_end_date', type: 'date', nullable: true)]
    private $tagEndDate;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'tag_date_add', type: 'datetime', nullable: true)]
    private $tagDateAdd;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'Recipe', mappedBy: 'fkTag')]
    private $fkRec;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fkRec = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTagId(): ?int
    {
        return $this->tagId;
    }

    public function getTagName(): ?string
    {
        return $this->tagName;
    }

    public function setTagName(?string $tagName): self
    {
        $this->tagName = $tagName;

        return $this;
    }

    public function getTagStartDate(): ?\DateTimeInterface
    {
        return $this->tagStartDate;
    }

    public function setTagStartDate(?\DateTimeInterface $tagStartDate): self
    {
        $this->tagStartDate = $tagStartDate;

        return $this;
    }

    public function getTagEndDate(): ?\DateTimeInterface
    {
        return $this->tagEndDate;
    }

    public function setTagEndDate(?\DateTimeInterface $tagEndDate): self
    {
        $this->tagEndDate = $tagEndDate;

        return $this;
    }

    public function getTagDateAdd(): ?\DateTimeInterface
    {
        return $this->tagDateAdd;
    }

    public function setTagDateAdd(?\DateTimeInterface $tagDateAdd): self
    {
        $this->tagDateAdd = $tagDateAdd;

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
            $fkRec->addFkTag($this);
        }

        return $this;
    }

    public function removeFkRec(Recipe $fkRec): self
    {
        if ($this->fkRec->removeElement($fkRec)) {
            $fkRec->removeFkTag($this);
        }

        return $this;
    }
}
