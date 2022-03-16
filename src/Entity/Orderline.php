<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Orderline
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'orderline')]
#[ORM\Entity]
class Orderline
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ord_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $ordId;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ordline_ingredient_id__', type: 'integer', nullable: true)]
    private $ordlineIngredientId;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ordline_price_ht', type: 'integer', nullable: true)]
    private $ordlinePriceHt;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ordline_price_ttc', type: 'integer', nullable: true)]
    private $ordlinePriceTtc;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'ordline_date_add', type: 'datetime', nullable: true)]
    private $ordlineDateAdd;

    public function getOrdId(): ?int
    {
        return $this->ordId;
    }

    public function getOrdlineIngredientId(): ?int
    {
        return $this->ordlineIngredientId;
    }

    public function setOrdlineIngredientId(?int $ordlineIngredientId): self
    {
        $this->ordlineIngredientId = $ordlineIngredientId;

        return $this;
    }

    public function getOrdlinePriceHt(): ?int
    {
        return $this->ordlinePriceHt;
    }

    public function setOrdlinePriceHt(?int $ordlinePriceHt): self
    {
        $this->ordlinePriceHt = $ordlinePriceHt;

        return $this;
    }

    public function getOrdlinePriceTtc(): ?int
    {
        return $this->ordlinePriceTtc;
    }

    public function setOrdlinePriceTtc(?int $ordlinePriceTtc): self
    {
        $this->ordlinePriceTtc = $ordlinePriceTtc;

        return $this;
    }

    public function getOrdlineDateAdd(): ?\DateTimeInterface
    {
        return $this->ordlineDateAdd;
    }

    public function setOrdlineDateAdd(?\DateTimeInterface $ordlineDateAdd): self
    {
        $this->ordlineDateAdd = $ordlineDateAdd;

        return $this;
    }
}
