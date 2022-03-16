<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * RelIngredientProvider
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'rel_ingredient_provider')]
#[ORM\Index(name: 'FK_rel_ingredient_provider_IngredientPrice', columns: ['FK_ingredient_price_id'])]
#[ORM\Index(name: 'FK_rel_ingredient_provider_Provider', columns: ['FK_prov_id'])]
#[ORM\Index(name: 'IDX_577AD606DCE36DE0', columns: ['FK_ing_id'])]
#[ORM\Entity]
class RelIngredientProvider
{
    /**
     * @var \Ingredient
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: 'Ingredient')]
    #[ORM\JoinColumn(name: 'FK_ing_id', referencedColumnName: 'ing_id')]
    private $fkIng;

    /**
     * @var \Provider
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: 'Provider')]
    #[ORM\JoinColumn(name: 'FK_prov_id', referencedColumnName: 'prov_id')]
    private $fkProv;

    /**
     * @var \Ingredientprice
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: 'Ingredientprice')]
    #[ORM\JoinColumn(name: 'FK_ingredient_price_id', referencedColumnName: 'ingredient_price_id')]
    private $fkIngredientPrice;

    public function getFkIng(): ?Ingredient
    {
        return $this->fkIng;
    }

    public function setFkIng(?Ingredient $fkIng): self
    {
        $this->fkIng = $fkIng;

        return $this;
    }

    public function getFkProv(): ?Provider
    {
        return $this->fkProv;
    }

    public function setFkProv(?Provider $fkProv): self
    {
        $this->fkProv = $fkProv;

        return $this;
    }

    public function getFkIngredientPrice(): ?Ingredientprice
    {
        return $this->fkIngredientPrice;
    }

    public function setFkIngredientPrice(?Ingredientprice $fkIngredientPrice): self
    {
        $this->fkIngredientPrice = $fkIngredientPrice;

        return $this;
    }
}
