<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * RelSteptechnicalIngredientListe
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'rel_steptechnical_ingredient__liste_')]
#[ORM\Index(name: 'FK_rel_stepTechnical_ingredient__liste__QuantityForStep', columns: ['FK_quantity_for_step_id'])]
#[ORM\Index(name: 'FK_rel_stepTechnical_ingredient__liste__Step', columns: ['FK_step_tec_id'])]
#[ORM\Index(name: 'IDX_E9679212DCE36DE0', columns: ['FK_ing_id'])]
#[ORM\Entity]
class RelSteptechnicalIngredientListe
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
     * @var \Step
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: 'Step')]
    #[ORM\JoinColumn(name: 'FK_step_tec_id', referencedColumnName: 'step_tec_id')]
    private $fkStepTec;

    /**
     * @var \Quantityforstep
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: 'Quantityforstep')]
    #[ORM\JoinColumn(name: 'FK_quantity_for_step_id', referencedColumnName: 'quantity_for_step_id')]
    private $fkQuantityForStep;

    public function getFkIng(): ?Ingredient
    {
        return $this->fkIng;
    }

    public function setFkIng(?Ingredient $fkIng): self
    {
        $this->fkIng = $fkIng;

        return $this;
    }

    public function getFkStepTec(): ?Step
    {
        return $this->fkStepTec;
    }

    public function setFkStepTec(?Step $fkStepTec): self
    {
        $this->fkStepTec = $fkStepTec;

        return $this;
    }

    public function getFkQuantityForStep(): ?Quantityforstep
    {
        return $this->fkQuantityForStep;
    }

    public function setFkQuantityForStep(?Quantityforstep $fkQuantityForStep): self
    {
        $this->fkQuantityForStep = $fkQuantityForStep;

        return $this;
    }


}
