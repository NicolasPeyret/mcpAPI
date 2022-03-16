<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * OrderproviderRel
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'orderprovider__rel___')]
#[ORM\Entity]
class OrderproviderRel
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ord_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $ordId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ord_customer_id__', type: 'string', length: 50, nullable: true)]
    private $ordCustomerId;

    public function getOrdId(): ?int
    {
        return $this->ordId;
    }

    public function getOrdCustomerId(): ?string
    {
        return $this->ordCustomerId;
    }

    public function setOrdCustomerId(?string $ordCustomerId): self
    {
        $this->ordCustomerId = $ordCustomerId;

        return $this;
    }
}
