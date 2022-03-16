<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Recipe
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'recipe')]
#[ORM\Index(name: 'FK_Recipe_Recipe', columns: ['FK_rec_id'])]
#[ORM\Index(name: 'FK_Recipe_Customer', columns: ['FK_cust_id'])]
#[ORM\Entity]
class Recipe
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'rec_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $recId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'rec_name', type: 'string', length: 255, nullable: true)]
    private $recName;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'rec_slug', type: 'string', length: 255, nullable: true)]
    private $recSlug;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'rec_source', type: 'string', length: 255, nullable: true)]
    private $recSource;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'rec_description', type: 'text', length: 65535, nullable: true)]
    private $recDescription;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'rec_preparation_time', type: 'time', nullable: true)]
    private $recPreparationTime;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'rec_sleep_time', type: 'time', nullable: true)]
    private $recSleepTime;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'rec_cooking_time', type: 'time', nullable: true)]
    private $recCookingTime;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'rec_savour', type: 'integer', nullable: true)]
    private $recSavour;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'rec_difficulty', type: 'integer', nullable: true)]
    private $recDifficulty;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'rec_status', type: 'integer', nullable: true)]
    private $recStatus;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'rec_date_add', type: 'datetime', nullable: true)]
    private $recDateAdd;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'rec_date_upd', type: 'datetime', nullable: true)]
    private $recDateUpd;

    /**
     * @var \Customer
     */
    #[ORM\ManyToOne(targetEntity: 'Customer')]
    #[ORM\JoinColumn(name: 'FK_cust_id', referencedColumnName: 'cust_id')]
    private $fkCust;

    /**
     * @var \Recipe
     */
    #[ORM\ManyToOne(targetEntity: 'Recipe')]
    #[ORM\JoinColumn(name: 'FK_rec_id', referencedColumnName: 'rec_id')]
    private $fkRec;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'Picture', inversedBy: 'fkRec')]
    #[ORM\JoinTable(name: 'rel_picture_recipe', joinColumns: [], inverseJoinColumns: [])]
    #[ORM\JoinColumn(name: 'FK_rec_id', referencedColumnName: 'rec_id')]
    #[ORM\JoinColumn(name: 'FK_pic_id', referencedColumnName: 'pic_id')]
    private $fkPic;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'Tag', inversedBy: 'fkRec')]
    #[ORM\JoinTable(name: 'rel_recipe_tag', joinColumns: [], inverseJoinColumns: [])]
    #[ORM\JoinColumn(name: 'FK_rec_id', referencedColumnName: 'rec_id')]
    #[ORM\JoinColumn(name: 'FK_tag_id', referencedColumnName: 'tag_id')]
    private $fkTag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fkPic = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fkTag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getRecId(): ?int
    {
        return $this->recId;
    }

    public function getRecName(): ?string
    {
        return $this->recName;
    }

    public function setRecName(?string $recName): self
    {
        $this->recName = $recName;

        return $this;
    }

    public function getRecSlug(): ?string
    {
        return $this->recSlug;
    }

    public function setRecSlug(?string $recSlug): self
    {
        $this->recSlug = $recSlug;

        return $this;
    }

    public function getRecSource(): ?string
    {
        return $this->recSource;
    }

    public function setRecSource(?string $recSource): self
    {
        $this->recSource = $recSource;

        return $this;
    }

    public function getRecDescription(): ?string
    {
        return $this->recDescription;
    }

    public function setRecDescription(?string $recDescription): self
    {
        $this->recDescription = $recDescription;

        return $this;
    }

    public function getRecPreparationTime(): ?\DateTimeInterface
    {
        return $this->recPreparationTime;
    }

    public function setRecPreparationTime(?\DateTimeInterface $recPreparationTime): self
    {
        $this->recPreparationTime = $recPreparationTime;

        return $this;
    }

    public function getRecSleepTime(): ?\DateTimeInterface
    {
        return $this->recSleepTime;
    }

    public function setRecSleepTime(?\DateTimeInterface $recSleepTime): self
    {
        $this->recSleepTime = $recSleepTime;

        return $this;
    }

    public function getRecCookingTime(): ?\DateTimeInterface
    {
        return $this->recCookingTime;
    }

    public function setRecCookingTime(?\DateTimeInterface $recCookingTime): self
    {
        $this->recCookingTime = $recCookingTime;

        return $this;
    }

    public function getRecSavour(): ?int
    {
        return $this->recSavour;
    }

    public function setRecSavour(?int $recSavour): self
    {
        $this->recSavour = $recSavour;

        return $this;
    }

    public function getRecDifficulty(): ?int
    {
        return $this->recDifficulty;
    }

    public function setRecDifficulty(?int $recDifficulty): self
    {
        $this->recDifficulty = $recDifficulty;

        return $this;
    }

    public function getRecStatus(): ?int
    {
        return $this->recStatus;
    }

    public function setRecStatus(?int $recStatus): self
    {
        $this->recStatus = $recStatus;

        return $this;
    }

    public function getRecDateAdd(): ?\DateTimeInterface
    {
        return $this->recDateAdd;
    }

    public function setRecDateAdd(?\DateTimeInterface $recDateAdd): self
    {
        $this->recDateAdd = $recDateAdd;

        return $this;
    }

    public function getRecDateUpd(): ?\DateTimeInterface
    {
        return $this->recDateUpd;
    }

    public function setRecDateUpd(?\DateTimeInterface $recDateUpd): self
    {
        $this->recDateUpd = $recDateUpd;

        return $this;
    }

    public function getFkCust(): ?Customer
    {
        return $this->fkCust;
    }

    public function setFkCust(?Customer $fkCust): self
    {
        $this->fkCust = $fkCust;

        return $this;
    }

    public function getFkRec(): ?self
    {
        return $this->fkRec;
    }

    public function setFkRec(?self $fkRec): self
    {
        $this->fkRec = $fkRec;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getFkPic(): Collection
    {
        return $this->fkPic;
    }

    public function addFkPic(Picture $fkPic): self
    {
        if (!$this->fkPic->contains($fkPic)) {
            $this->fkPic[] = $fkPic;
        }

        return $this;
    }

    public function removeFkPic(Picture $fkPic): self
    {
        $this->fkPic->removeElement($fkPic);

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getFkTag(): Collection
    {
        return $this->fkTag;
    }

    public function addFkTag(Tag $fkTag): self
    {
        if (!$this->fkTag->contains($fkTag)) {
            $this->fkTag[] = $fkTag;
        }

        return $this;
    }

    public function removeFkTag(Tag $fkTag): self
    {
        $this->fkTag->removeElement($fkTag);

        return $this;
    }
}
