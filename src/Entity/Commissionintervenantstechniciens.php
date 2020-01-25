<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commissionintervenantstechniciens
 *
 * @ORM\Table(name="commissionintervenantstechniciens")
 * @ORM\Entity
 */
class Commissionintervenantstechniciens
{
    /**
     * @var int
     *
     * @ORM\Column(name="commissionintervenanttechnicienid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commissionintervenanttechnicienid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="technicienid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $technicienid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateoperation", type="date", nullable=true)
     */
    private $dateoperation;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantcommission", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantcommission;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getCommissionintervenanttechnicienid(): ?int
    {
        return $this->commissionintervenanttechnicienid;
    }

    public function getTechnicienid(): ?string
    {
        return $this->technicienid;
    }

    public function setTechnicienid(?string $technicienid): self
    {
        $this->technicienid = $technicienid;

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

    public function getMontantcommission(): ?float
    {
        return $this->montantcommission;
    }

    public function setMontantcommission(?float $montantcommission): self
    {
        $this->montantcommission = $montantcommission;

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
