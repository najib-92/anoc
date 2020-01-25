<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Djreunionsgroupements
 *
 * @ORM\Table(name="djreunionsgroupements")
 * @ORM\Entity
 */
class Djreunionsgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="djreuniongroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $djreuniongroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reuniongroupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $reuniongroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelledt", type="text", length=65535, nullable=true)
     */
    private $libelledt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getDjreuniongroupementid(): ?int
    {
        return $this->djreuniongroupementid;
    }

    public function getReuniongroupementid(): ?string
    {
        return $this->reuniongroupementid;
    }

    public function setReuniongroupementid(?string $reuniongroupementid): self
    {
        $this->reuniongroupementid = $reuniongroupementid;

        return $this;
    }

    public function getLibelledt(): ?string
    {
        return $this->libelledt;
    }

    public function setLibelledt(?string $libelledt): self
    {
        $this->libelledt = $libelledt;

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
