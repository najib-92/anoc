<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Batimentselevegeeleveursprospectes
 *
 * @ORM\Table(name="batimentselevegeeleveursprospectes", indexes={@ORM\Index(name="fk_relationship_71", columns={"con_conventionid"})})
 * @ORM\Entity
 */
class Batimentselevegeeleveursprospectes
{
    /**
     * @var int
     *
     * @ORM\Column(name="batimentelevegeeleveurprospecteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $batimentelevegeeleveurprospecteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurprospecteid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurprospecteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="batiment", type="text", length=65535, nullable=true)
     */
    private $batiment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="superficie", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $superficie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etat", type="text", length=65535, nullable=true)
     */
    private $etat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="equipement", type="text", length=65535, nullable=true)
     */
    private $equipement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var \Conventions
     *
     * @ORM\ManyToOne(targetEntity="Conventions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="con_conventionid", referencedColumnName="conventionid")
     * })
     */
    private $conConventionid;

    public function getBatimentelevegeeleveurprospecteid(): ?int
    {
        return $this->batimentelevegeeleveurprospecteid;
    }

    public function getConventionid(): ?string
    {
        return $this->conventionid;
    }

    public function setConventionid(?string $conventionid): self
    {
        $this->conventionid = $conventionid;

        return $this;
    }

    public function getEleveurprospecteid(): ?string
    {
        return $this->eleveurprospecteid;
    }

    public function setEleveurprospecteid(?string $eleveurprospecteid): self
    {
        $this->eleveurprospecteid = $eleveurprospecteid;

        return $this;
    }

    public function getBatiment(): ?string
    {
        return $this->batiment;
    }

    public function setBatiment(?string $batiment): self
    {
        $this->batiment = $batiment;

        return $this;
    }

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }

    public function setSuperficie(?string $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getEquipement(): ?string
    {
        return $this->equipement;
    }

    public function setEquipement(?string $equipement): self
    {
        $this->equipement = $equipement;

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

    public function getConConventionid(): ?Conventions
    {
        return $this->conConventionid;
    }

    public function setConConventionid(?Conventions $conConventionid): self
    {
        $this->conConventionid = $conConventionid;

        return $this;
    }


}
