<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Step
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
)]
#[ORM\Table(name: 'step')]
#[ORM\Index(name: 'FK_Step_Technical', columns: ['FK_tec_id'])]
#[ORM\Index(name: 'FK_Step_Recipe', columns: ['FK_rec_id'])]
#[ORM\Entity]
class Step
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'step_tec_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $stepTecId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'step_description', type: 'text', length: 65535, nullable: true)]
    private $stepDescription;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'step_order', type: 'integer', nullable: true)]
    private $stepOrder;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'step_date_add', type: 'datetime', nullable: true)]
    private $stepDateAdd;

    /**
     * @var \Recipe
     */
    #[ORM\ManyToOne(targetEntity: 'Recipe')]
    #[ORM\JoinColumn(name: 'FK_rec_id', referencedColumnName: 'rec_id')]
    private $fkRec;

    /**
     * @var \Technical
     */
    #[ORM\ManyToOne(targetEntity: 'Technical')]
    #[ORM\JoinColumn(name: 'FK_tec_id', referencedColumnName: 'tec_id')]
    private $fkTec;

    public function getStepTecId(): ?int
    {
        return $this->stepTecId;
    }

    public function getStepDescription(): ?string
    {
        return $this->stepDescription;
    }

    public function setStepDescription(?string $stepDescription): self
    {
        $this->stepDescription = $stepDescription;

        return $this;
    }

    public function getStepOrder(): ?int
    {
        return $this->stepOrder;
    }

    public function setStepOrder(?int $stepOrder): self
    {
        $this->stepOrder = $stepOrder;

        return $this;
    }

    public function getStepDateAdd(): ?\DateTimeInterface
    {
        return $this->stepDateAdd;
    }

    public function setStepDateAdd(?\DateTimeInterface $stepDateAdd): self
    {
        $this->stepDateAdd = $stepDateAdd;

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

    public function getFkTec(): ?Technical
    {
        return $this->fkTec;
    }

    public function setFkTec(?Technical $fkTec): self
    {
        $this->fkTec = $fkTec;

        return $this;
    }
}
