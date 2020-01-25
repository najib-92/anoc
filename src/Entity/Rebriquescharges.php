<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rebriquescharges
 *
 * @ORM\Table(name="rebriquescharges")
 * @ORM\Entity
 */
class Rebriquescharges
{
    /**
     * @var int
     *
     * @ORM\Column(name="rebriquechargeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rebriquechargeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rebrique", type="text", length=65535, nullable=true)
     */
    private $rebrique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getRebriquechargeid(): ?int
    {
        return $this->rebriquechargeid;
    }

    public function getRebrique(): ?string
    {
        return $this->rebrique;
    }

    public function setRebrique(?string $rebrique): self
    {
        $this->rebrique = $rebrique;

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
