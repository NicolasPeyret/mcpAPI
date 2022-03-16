<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Provider
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'provider')]
#[ORM\Entity]
class Provider
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'prov_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $provId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'prov_name', type: 'string', length: 100, nullable: true)]
    private $provName;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'prov_email', type: 'string', length: 100, nullable: true)]
    private $provEmail;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'prov_phone', type: 'string', length: 20, nullable: true)]
    private $provPhone;

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'prov_is_active', type: 'boolean', nullable: true)]
    private $provIsActive;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'prov_date_add', type: 'datetime', nullable: true)]
    private $provDateAdd;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'prov_date_upd', type: 'datetime', nullable: true)]
    private $provDateUpd;

    public function getProvId(): ?int
    {
        return $this->provId;
    }

    public function getProvName(): ?string
    {
        return $this->provName;
    }

    public function setProvName(?string $provName): self
    {
        $this->provName = $provName;

        return $this;
    }

    public function getProvEmail(): ?string
    {
        return $this->provEmail;
    }

    public function setProvEmail(?string $provEmail): self
    {
        $this->provEmail = $provEmail;

        return $this;
    }

    public function getProvPhone(): ?string
    {
        return $this->provPhone;
    }

    public function setProvPhone(?string $provPhone): self
    {
        $this->provPhone = $provPhone;

        return $this;
    }

    public function getProvIsActive(): ?bool
    {
        return $this->provIsActive;
    }

    public function setProvIsActive(?bool $provIsActive): self
    {
        $this->provIsActive = $provIsActive;

        return $this;
    }

    public function getProvDateAdd(): ?\DateTimeInterface
    {
        return $this->provDateAdd;
    }

    public function setProvDateAdd(?\DateTimeInterface $provDateAdd): self
    {
        $this->provDateAdd = $provDateAdd;

        return $this;
    }

    public function getProvDateUpd(): ?\DateTimeInterface
    {
        return $this->provDateUpd;
    }

    public function setProvDateUpd(?\DateTimeInterface $provDateUpd): self
    {
        $this->provDateUpd = $provDateUpd;

        return $this;
    }
}
