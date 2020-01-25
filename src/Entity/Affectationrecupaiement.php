<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectationrecupaiement
 *
 * @ORM\Table(name="affectationrecupaiement")
 * @ORM\Entity
 */
class Affectationrecupaiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="affectationrecupaiementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $affectationrecupaiementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secteurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $secteurid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateaffectation", type="date", nullable=true)
     */
    private $dateaffectation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numrecudebut", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $numrecudebut;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numrecufin", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $numrecufin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="technicienid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $technicienid;

    public function getAffectationrecupaiementid(): ?int
    {
        return $this->affectationrecupaiementid;
    }

    public function getSecteurid(): ?string
    {
        return $this->secteurid;
    }

    public function setSecteurid(?string $secteurid): self
    {
        $this->secteurid = $secteurid;

        return $this;
    }

    public function getDateaffectation(): ?\DateTimeInterface
    {
        return $this->dateaffectation;
    }

    public function setDateaffectation(?\DateTimeInterface $dateaffectation): self
    {
        $this->dateaffectation = $dateaffectation;

        return $this;
    }

    public function getNumrecudebut(): ?string
    {
        return $this->numrecudebut;
    }

    public function setNumrecudebut(?string $numrecudebut): self
    {
        $this->numrecudebut = $numrecudebut;

        return $this;
    }

    public function getNumrecufin(): ?string
    {
        return $this->numrecufin;
    }

    public function setNumrecufin(?string $numrecufin): self
    {
        $this->numrecufin = $numrecufin;

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

    public function getTechnicienid(): ?string
    {
        return $this->technicienid;
    }

    public function setTechnicienid(?string $technicienid): self
    {
        $this->technicienid = $technicienid;

        return $this;
    }


}
