<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Categorie
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'categorie')]
#[ORM\Index(name: 'FK_Categorie_Categorie', columns: ['FK_cat_id'])]
#[ORM\Entity]
class Categorie
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'cat_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $catId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'cat_name', type: 'string', length: 255, nullable: true)]
    private $catName;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'cat_slug', type: 'string', length: 255, nullable: true)]
    private $catSlug;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'cat_description', type: 'text', length: 65535, nullable: true)]
    private $catDescription;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'cat_icon', type: 'string', length: 1024, nullable: true)]
    private $catIcon;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'cat_id_parent', type: 'integer', nullable: true)]
    private $catIdParent;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'cat_order', type: 'integer', nullable: true)]
    private $catOrder;

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'cat_is_active', type: 'boolean', nullable: true)]
    private $catIsActive;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'cat_date_add', type: 'datetime', nullable: true)]
    private $catDateAdd;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'cat_date_upd', type: 'datetime', nullable: true)]
    private $catDateUpd;

    /**
     * @var \Categorie
     */
    #[ORM\ManyToOne(targetEntity: 'Categorie')]
    #[ORM\JoinColumn(name: 'FK_cat_id', referencedColumnName: 'cat_id')]
    private $fkCat;

    public function getCatId(): ?int
    {
        return $this->catId;
    }

    public function getCatName(): ?string
    {
        return $this->catName;
    }

    public function setCatName(?string $catName): self
    {
        $this->catName = $catName;

        return $this;
    }

    public function getCatSlug(): ?string
    {
        return $this->catSlug;
    }

    public function setCatSlug(?string $catSlug): self
    {
        $this->catSlug = $catSlug;

        return $this;
    }

    public function getCatDescription(): ?string
    {
        return $this->catDescription;
    }

    public function setCatDescription(?string $catDescription): self
    {
        $this->catDescription = $catDescription;

        return $this;
    }

    public function getCatIcon(): ?string
    {
        return $this->catIcon;
    }

    public function setCatIcon(?string $catIcon): self
    {
        $this->catIcon = $catIcon;

        return $this;
    }

    public function getCatIdParent(): ?int
    {
        return $this->catIdParent;
    }

    public function setCatIdParent(?int $catIdParent): self
    {
        $this->catIdParent = $catIdParent;

        return $this;
    }

    public function getCatOrder(): ?int
    {
        return $this->catOrder;
    }

    public function setCatOrder(?int $catOrder): self
    {
        $this->catOrder = $catOrder;

        return $this;
    }

    public function getCatIsActive(): ?bool
    {
        return $this->catIsActive;
    }

    public function setCatIsActive(?bool $catIsActive): self
    {
        $this->catIsActive = $catIsActive;

        return $this;
    }

    public function getCatDateAdd(): ?\DateTimeInterface
    {
        return $this->catDateAdd;
    }

    public function setCatDateAdd(?\DateTimeInterface $catDateAdd): self
    {
        $this->catDateAdd = $catDateAdd;

        return $this;
    }

    public function getCatDateUpd(): ?\DateTimeInterface
    {
        return $this->catDateUpd;
    }

    public function setCatDateUpd(?\DateTimeInterface $catDateUpd): self
    {
        $this->catDateUpd = $catDateUpd;

        return $this;
    }

    public function getFkCat(): ?self
    {
        return $this->fkCat;
    }

    public function setFkCat(?self $fkCat): self
    {
        $this->fkCat = $fkCat;

        return $this;
    }
}
