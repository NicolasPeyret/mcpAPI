<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Quantityforstep
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'quantityforstep')]
#[ORM\Entity]
class Quantityforstep
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'quantity_for_step_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $quantityForStepId;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'quantity', type: 'integer', nullable: true)]
    private $quantity;

    public function getQuantityForStepId(): ?int
    {
        return $this->quantityForStepId;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
