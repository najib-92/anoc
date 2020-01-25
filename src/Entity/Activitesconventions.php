<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Activitesconventions
 *
 * @ORM\Table(name="activitesconventions")
 * @ORM\Entity
 */
class Activitesconventions
{
    /**
     * @var int
     *
     * @ORM\Column(name="activiteconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $activiteconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="activite", type="text", length=65535, nullable=true)
     */
    private $activite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abs", type="text", length=65535, nullable=true)
     */
    private $abs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Conventions", mappedBy="activiteconventionid")
     */
    private $conventionid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conventionid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getActiviteconventionid(): ?int
    {
        return $this->activiteconventionid;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(?string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getAbs(): ?string
    {
        return $this->abs;
    }

    public function setAbs(?string $abs): self
    {
        $this->abs = $abs;

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
            $conventionid->addActiviteconventionid($this);
        }

        return $this;
    }

    public function removeConventionid(Conventions $conventionid): self
    {
        if ($this->conventionid->contains($conventionid)) {
            $this->conventionid->removeElement($conventionid);
            $conventionid->removeActiviteconventionid($this);
        }

        return $this;
    }

}
