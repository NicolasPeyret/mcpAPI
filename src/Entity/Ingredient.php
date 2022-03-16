<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ingredient
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'ingredient')]
#[ORM\UniqueConstraint(name: 'AK_Ingredient', columns: ['FK_pic_id'])]
#[ORM\Index(name: 'FK_Ingredient_Categorie', columns: ['FK_cat_id'])]
#[ORM\Index(name: 'FK_Ingredient_Unit', columns: ['FK_unit_id'])]
#[ORM\Entity]
class Ingredient
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ing_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $ingId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ing_name', type: 'string', length: 255, nullable: true)]
    private $ingName;

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'ing_is_active', type: 'boolean', nullable: true)]
    private $ingIsActive;

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'ing_is_allergenic', type: 'boolean', nullable: true)]
    private $ingIsAllergenic;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'ing_date_add', type: 'datetime', nullable: true)]
    private $ingDateAdd;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'ing_date_upd', type: 'datetime', nullable: true)]
    private $ingDateUpd;

    /**
     * @var \Categorie
     */
    #[ORM\ManyToOne(targetEntity: 'Categorie')]
    #[ORM\JoinColumn(name: 'FK_cat_id', referencedColumnName: 'cat_id')]
    private $fkCat;

    /**
     * @var \Unit
     */
    #[ORM\ManyToOne(targetEntity: 'Unit')]
    #[ORM\JoinColumn(name: 'FK_unit_id', referencedColumnName: 'unit_id')]
    private $fkUnit;

    /**
     * @var \Picture
     */
    #[ORM\ManyToOne(targetEntity: 'Picture')]
    #[ORM\JoinColumn(name: 'FK_pic_id', referencedColumnName: 'pic_id')]
    private $fkPic;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'Season', inversedBy: 'fkIng')]
    #[ORM\JoinTable(name: 'rel_ingredient_season', joinColumns: [], inverseJoinColumns: [])]
    #[ORM\JoinColumn(name: 'FK_ing_id', referencedColumnName: 'ing_id')]
    #[ORM\JoinColumn(name: 'FK_season_id', referencedColumnName: 'season_id')]
    private $fkSeason;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fkSeason = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIngId(): ?int
    {
        return $this->ingId;
    }

    public function getIngName(): ?string
    {
        return $this->ingName;
    }

    public function setIngName(?string $ingName): self
    {
        $this->ingName = $ingName;

        return $this;
    }

    public function getIngIsActive(): ?bool
    {
        return $this->ingIsActive;
    }

    public function setIngIsActive(?bool $ingIsActive): self
    {
        $this->ingIsActive = $ingIsActive;

        return $this;
    }

    public function getIngIsAllergenic(): ?bool
    {
        return $this->ingIsAllergenic;
    }

    public function setIngIsAllergenic(?bool $ingIsAllergenic): self
    {
        $this->ingIsAllergenic = $ingIsAllergenic;

        return $this;
    }

    public function getIngDateAdd(): ?\DateTimeInterface
    {
        return $this->ingDateAdd;
    }

    public function setIngDateAdd(?\DateTimeInterface $ingDateAdd): self
    {
        $this->ingDateAdd = $ingDateAdd;

        return $this;
    }

    public function getIngDateUpd(): ?\DateTimeInterface
    {
        return $this->ingDateUpd;
    }

    public function setIngDateUpd(?\DateTimeInterface $ingDateUpd): self
    {
        $this->ingDateUpd = $ingDateUpd;

        return $this;
    }

    public function getFkCat(): ?Categorie
    {
        return $this->fkCat;
    }

    public function setFkCat(?Categorie $fkCat): self
    {
        $this->fkCat = $fkCat;

        return $this;
    }

    public function getFkUnit(): ?Unit
    {
        return $this->fkUnit;
    }

    public function setFkUnit(?Unit $fkUnit): self
    {
        $this->fkUnit = $fkUnit;

        return $this;
    }

    public function getFkPic(): ?Picture
    {
        return $this->fkPic;
    }

    public function setFkPic(?Picture $fkPic): self
    {
        $this->fkPic = $fkPic;

        return $this;
    }

    /**
     * @return Collection|Season[]
     */
    public function getFkSeason(): Collection
    {
        return $this->fkSeason;
    }

    public function addFkSeason(Season $fkSeason): self
    {
        if (!$this->fkSeason->contains($fkSeason)) {
            $this->fkSeason[] = $fkSeason;
        }

        return $this;
    }

    public function removeFkSeason(Season $fkSeason): self
    {
        $this->fkSeason->removeElement($fkSeason);

        return $this;
    }
}
