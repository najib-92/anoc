<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Regionsprojets
 *
 * @ORM\Table(name="regionsprojets", indexes={@ORM\Index(name="fk_relationship_74", columns={"projetid"})})
 * @ORM\Entity
 */
class Regionsprojets
{
    /**
     * @var int
     *
     * @ORM\Column(name="regionprojetid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $regionprojetid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var \Projets
     *
     * @ORM\ManyToOne(targetEntity="Projets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projetid", referencedColumnName="projetid")
     * })
     */
    private $projetid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Communes", mappedBy="regionprojetid")
     */
    private $communeid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->communeid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getRegionprojetid(): ?int
    {
        return $this->regionprojetid;
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

    public function getProjetid(): ?Projets
    {
        return $this->projetid;
    }

    public function setProjetid(?Projets $projetid): self
    {
        $this->projetid = $projetid;

        return $this;
    }

    /**
     * @return Collection|Communes[]
     */
    public function getCommuneid(): Collection
    {
        return $this->communeid;
    }

    public function addCommuneid(Communes $communeid): self
    {
        if (!$this->communeid->contains($communeid)) {
            $this->communeid[] = $communeid;
            $communeid->addRegionprojetid($this);
        }

        return $this;
    }

    public function removeCommuneid(Communes $communeid): self
    {
        if ($this->communeid->contains($communeid)) {
            $this->communeid->removeElement($communeid);
            $communeid->removeRegionprojetid($this);
        }

        return $this;
    }

}
