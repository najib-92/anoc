<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suivicaissesgroupements
 *
 * @ORM\Table(name="suivicaissesgroupements")
 * @ORM\Entity
 */
class Suivicaissesgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="suivicaissegroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $suivicaissegroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateoperation", type="datetime", nullable=true)
     */
    private $dateoperation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="operation", type="text", length=65535, nullable=true)
     */
    private $operation;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantrecette", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantrecette;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantdepence", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantdepence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getSuivicaissegroupementid(): ?int
    {
        return $this->suivicaissegroupementid;
    }

    public function getGroupementid(): ?string
    {
        return $this->groupementid;
    }

    public function setGroupementid(?string $groupementid): self
    {
        $this->groupementid = $groupementid;

        return $this;
    }

    public function getDateoperation(): ?\DateTimeInterface
    {
        return $this->dateoperation;
    }

    public function setDateoperation(?\DateTimeInterface $dateoperation): self
    {
        $this->dateoperation = $dateoperation;

        return $this;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getMontantrecette(): ?float
    {
        return $this->montantrecette;
    }

    public function setMontantrecette(?float $montantrecette): self
    {
        $this->montantrecette = $montantrecette;

        return $this;
    }

    public function getMontantdepence(): ?float
    {
        return $this->montantdepence;
    }

    public function setMontantdepence(?float $montantdepence): self
    {
        $this->montantdepence = $montantdepence;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }


}
