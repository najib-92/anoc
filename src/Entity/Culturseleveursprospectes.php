<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Culturseleveursprospectes
 *
 * @ORM\Table(name="culturseleveursprospectes")
 * @ORM\Entity
 */
class Culturseleveursprospectes
{
    /**
     * @var int
     *
     * @ORM\Column(name="cultureleveurprospecteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cultureleveurprospecteid;

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
     * @ORM\Column(name="culture", type="text", length=65535, nullable=true)
     */
    private $culture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suphe", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $suphe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getCultureleveurprospecteid(): ?int
    {
        return $this->cultureleveurprospecteid;
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

    public function getCulture(): ?string
    {
        return $this->culture;
    }

    public function setCulture(?string $culture): self
    {
        $this->culture = $culture;

        return $this;
    }

    public function getSuphe(): ?string
    {
        return $this->suphe;
    }

    public function setSuphe(?string $suphe): self
    {
        $this->suphe = $suphe;

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
