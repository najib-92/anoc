<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indicateuruneconvention
 *
 * @ORM\Table(name="indicateuruneconvention")
 * @ORM\Entity
 */
class Indicateuruneconvention
{
    /**
     * @var int
     *
     * @ORM\Column(name="indicateuruneconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $indicateuruneconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="indicateurdesconventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $indicateurdesconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objectif", type="text", length=65535, nullable=true)
     */
    private $objectif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="realisation", type="text", length=65535, nullable=true)
     */
    private $realisation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="unite", type="text", length=65535, nullable=true)
     */
    private $unite;

    public function getIndicateuruneconventionid(): ?int
    {
        return $this->indicateuruneconventionid;
    }

    public function getIndicateurdesconventionid(): ?string
    {
        return $this->indicateurdesconventionid;
    }

    public function setIndicateurdesconventionid(?string $indicateurdesconventionid): self
    {
        $this->indicateurdesconventionid = $indicateurdesconventionid;

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

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(?string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getRealisation(): ?string
    {
        return $this->realisation;
    }

    public function setRealisation(?string $realisation): self
    {
        $this->realisation = $realisation;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(?string $unite): self
    {
        $this->unite = $unite;

        return $this;
    }


}
