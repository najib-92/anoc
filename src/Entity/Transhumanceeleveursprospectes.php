<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transhumanceeleveursprospectes
 *
 * @ORM\Table(name="transhumanceeleveursprospectes")
 * @ORM\Entity
 */
class Transhumanceeleveursprospectes
{
    /**
     * @var int
     *
     * @ORM\Column(name="transhumanceeleveurprospecteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $transhumanceeleveurprospecteid;

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
     * @ORM\Column(name="lieu", type="text", length=65535, nullable=true)
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="distance", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $distance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="periode", type="text", length=65535, nullable=true)
     */
    private $periode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getTranshumanceeleveurprospecteid(): ?int
    {
        return $this->transhumanceeleveurprospecteid;
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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDistance(): ?string
    {
        return $this->distance;
    }

    public function setDistance(?string $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(?string $periode): self
    {
        $this->periode = $periode;

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
