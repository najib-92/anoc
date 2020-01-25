<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commissionscomtables
 *
 * @ORM\Table(name="commissionscomtables")
 * @ORM\Entity
 */
class Commissionscomtables
{
    /**
     * @var int
     *
     * @ORM\Column(name="commissioncomtableid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commissioncomtableid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="membrecommissioncomptableid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $membrecommissioncomptableid;

    public function getCommissioncomtableid(): ?int
    {
        return $this->commissioncomtableid;
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

    public function getMembrecommissioncomptableid(): ?string
    {
        return $this->membrecommissioncomptableid;
    }

    public function setMembrecommissioncomptableid(?string $membrecommissioncomptableid): self
    {
        $this->membrecommissioncomptableid = $membrecommissioncomptableid;

        return $this;
    }


}
