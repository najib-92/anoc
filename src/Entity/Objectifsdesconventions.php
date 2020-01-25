<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Objectifsdesconventions
 *
 * @ORM\Table(name="objectifsdesconventions")
 * @ORM\Entity
 */
class Objectifsdesconventions
{
    /**
     * @var int
     *
     * @ORM\Column(name="objectifdeconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $objectifdeconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objectif", type="text", length=65535, nullable=true)
     */
    private $objectif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Conventions", mappedBy="objectifdeconventionid")
     */
    private $conventionid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conventionid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getObjectifdeconventionid(): ?int
    {
        return $this->objectifdeconventionid;
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

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * @return Collection|Conventions[]
     */
    public function getConventionid(): Collection
    {
        return $this->conventionid;
    }

    public function addConventionid(Conventions $conventionid): self
    {
        if (!$this->conventionid->contains($conventionid)) {
            $this->conventionid[] = $conventionid;
            $conventionid->addObjectifdeconventionid($this);
        }

        return $this;
    }

    public function removeConventionid(Conventions $conventionid): self
    {
        if ($this->conventionid->contains($conventionid)) {
            $this->conventionid->removeElement($conventionid);
            $conventionid->removeObjectifdeconventionid($this);
        }

        return $this;
    }

}
