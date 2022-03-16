<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * Address
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'address')]
#[ORM\UniqueConstraint(name: 'AK_Address_1', columns: ['FK_cust_id'])]
#[ORM\UniqueConstraint(name: 'AK_Address', columns: ['FK_prov_id'])]
#[ORM\Entity]
class Address
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'adress_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $adressId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'adress_label1', type: 'string', length: 255, nullable: true)]
    private $adressLabel1;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'adress_label2', type: 'string', length: 255, nullable: true)]
    private $adressLabel2;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'adress_zip_code', type: 'integer', nullable: true)]
    private $adressZipCode;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'adress_city', type: 'string', length: 255, nullable: true)]
    private $adressCity;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'adress_country', type: 'string', length: 255, nullable: true)]
    private $adressCountry;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'adress_other', type: 'string', length: 255, nullable: true)]
    private $adressOther;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'adress_date_add', type: 'datetime', nullable: true)]
    private $adressDateAdd;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'adress_date_upd', type: 'datetime', nullable: true)]
    private $adressDateUpd;

    /**
     * @var \Customer
     */
    #[ORM\ManyToOne(targetEntity: 'Customer')]
    #[ORM\JoinColumn(name: 'FK_cust_id', referencedColumnName: 'cust_id')]
    private $fkCust;

    /**
     * @var \Provider
     */
    #[ORM\ManyToOne(targetEntity: 'Provider')]
    #[ORM\JoinColumn(name: 'FK_prov_id', referencedColumnName: 'prov_id')]
    private $fkProv;

    public function getAdressId(): ?int
    {
        return $this->adressId;
    }

    public function getAdressLabel1(): ?string
    {
        return $this->adressLabel1;
    }

    public function setAdressLabel1(?string $adressLabel1): self
    {
        $this->adressLabel1 = $adressLabel1;

        return $this;
    }

    public function getAdressLabel2(): ?string
    {
        return $this->adressLabel2;
    }

    public function setAdressLabel2(?string $adressLabel2): self
    {
        $this->adressLabel2 = $adressLabel2;

        return $this;
    }

    public function getAdressZipCode(): ?int
    {
        return $this->adressZipCode;
    }

    public function setAdressZipCode(?int $adressZipCode): self
    {
        $this->adressZipCode = $adressZipCode;

        return $this;
    }

    public function getAdressCity(): ?string
    {
        return $this->adressCity;
    }

    public function setAdressCity(?string $adressCity): self
    {
        $this->adressCity = $adressCity;

        return $this;
    }

    public function getAdressCountry(): ?string
    {
        return $this->adressCountry;
    }

    public function setAdressCountry(?string $adressCountry): self
    {
        $this->adressCountry = $adressCountry;

        return $this;
    }

    public function getAdressOther(): ?string
    {
        return $this->adressOther;
    }

    public function setAdressOther(?string $adressOther): self
    {
        $this->adressOther = $adressOther;

        return $this;
    }

    public function getAdressDateAdd(): ?\DateTimeInterface
    {
        return $this->adressDateAdd;
    }

    public function setAdressDateAdd(?\DateTimeInterface $adressDateAdd): self
    {
        $this->adressDateAdd = $adressDateAdd;

        return $this;
    }

    public function getAdressDateUpd(): ?\DateTimeInterface
    {
        return $this->adressDateUpd;
    }

    public function setAdressDateUpd(?\DateTimeInterface $adressDateUpd): self
    {
        $this->adressDateUpd = $adressDateUpd;

        return $this;
    }

    public function getFkCust(): ?Customer
    {
        return $this->fkCust;
    }

    public function setFkCust(?Customer $fkCust): self
    {
        $this->fkCust = $fkCust;

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


}
