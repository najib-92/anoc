<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chargesgroupements
 *
 * @ORM\Table(name="chargesgroupements")
 * @ORM\Entity
 */
class Chargesgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="chargegroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chargegroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rubriquechargeid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $rubriquechargeid;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=true)
     */
    private $montant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getChargegroupementid(): ?int
    {
        return $this->chargegroupementid;
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

    public function getRubriquechargeid(): ?string
    {
        return $this->rubriquechargeid;
    }

    public function setRubriquechargeid(?string $rubriquechargeid): self
    {
        $this->rubriquechargeid = $rubriquechargeid;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

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
