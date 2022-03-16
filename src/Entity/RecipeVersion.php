<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * RecipeVersion
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'recipe_version')]
#[ORM\Index(name: 'FK_Recipe_version_Recipe', columns: ['FK_rec_id'])]
#[ORM\Entity]
class RecipeVersion
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ver_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $verId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ver_name', type: 'string', length: 255, nullable: true)]
    private $verName;

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'ver_final_version', type: 'boolean', nullable: true)]
    private $verFinalVersion;

    /**
     * @var \Recipe
     */
    #[ORM\ManyToOne(targetEntity: 'Recipe')]
    #[ORM\JoinColumn(name: 'FK_rec_id', referencedColumnName: 'rec_id')]
    private $fkRec;

    public function getVerId(): ?int
    {
        return $this->verId;
    }

    public function getVerName(): ?string
    {
        return $this->verName;
    }

    public function setVerName(?string $verName): self
    {
        $this->verName = $verName;

        return $this;
    }

    public function getVerFinalVersion(): ?bool
    {
        return $this->verFinalVersion;
    }

    public function setVerFinalVersion(?bool $verFinalVersion): self
    {
        $this->verFinalVersion = $verFinalVersion;

        return $this;
    }

    public function getFkRec(): ?Recipe
    {
        return $this->fkRec;
    }

    public function setFkRec(?Recipe $fkRec): self
    {
        $this->fkRec = $fkRec;

        return $this;
    }
}
