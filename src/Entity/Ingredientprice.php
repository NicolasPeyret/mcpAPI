<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Ingredientprice
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'ingredientprice')]
#[ORM\Entity]
class Ingredientprice
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ingredient_price_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $ingredientPriceId;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'prix_ht', type: 'integer', nullable: true)]
    private $prixHt;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'comment', type: 'string', length: 255, nullable: true)]
    private $comment;

    public function getIngredientPriceId(): ?int
    {
        return $this->ingredientPriceId;
    }

    public function getPrixHt(): ?int
    {
        return $this->prixHt;
    }

    public function setPrixHt(?int $prixHt): self
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
