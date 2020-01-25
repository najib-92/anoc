<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suptenuelevage
 *
 * @ORM\Table(name="suptenuelevage")
 * @ORM\Entity
 */
class Suptenuelevage
{
    /**
     * @var int
     *
     * @ORM\Column(name="suptenuelevageid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $suptenuelevageid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurprospecteid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurprospecteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suptenuelevage", type="text", length=65535, nullable=true)
     */
    private $suptenuelevage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getSuptenuelevageid(): ?int
    {
        return $this->suptenuelevageid;
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

    public function getSuptenuelevage(): ?string
    {
        return $this->suptenuelevage;
    }

    public function setSuptenuelevage(?string $suptenuelevage): self
    {
        $this->suptenuelevage = $suptenuelevage;

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
