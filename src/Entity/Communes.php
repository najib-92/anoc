<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Communes
 *
 * @ORM\Table(name="communes", indexes={@ORM\Index(name="fk_relationship_44", columns={"villeid"})})
 * @ORM\Entity
 */
class Communes
{
    /**
     * @var int
     *
     * @ORM\Column(name="communeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $communeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="communefr", type="text", length=65535, nullable=true)
     */
    private $communefr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="communear", type="text", length=65535, nullable=true)
     */
    private $communear;

    /**
     * @var \Villes
     *
     * @ORM\ManyToOne(targetEntity="Villes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="villeid", referencedColumnName="villeid")
     * })
     */
    private $villeid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Regionsprojets", inversedBy="communeid")
     * @ORM\JoinTable(name="relationship_71",
     *   joinColumns={
     *     @ORM\JoinColumn(name="communeid", referencedColumnName="communeid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="regionprojetid", referencedColumnName="regionprojetid")
     *   }
     * )
     */
    private $regionprojetid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->regionprojetid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCommuneid(): ?int
    {
        return $this->communeid;
    }

    public function getCommunefr(): ?string
    {
        return $this->communefr;
    }

    public function setCommunefr(?string $communefr): self
    {
        $this->communefr = $communefr;

        return $this;
    }

    public function getCommunear(): ?string
    {
        return $this->communear;
    }

    public function setCommunear(?string $communear): self
    {
        $this->communear = $communear;

        return $this;
    }

    public function getVilleid(): ?Villes
    {
        return $this->villeid;
    }

    public function setVilleid(?Villes $villeid): self
    {
        $this->villeid = $villeid;

        return $this;
    }

    /**
     * @return Collection|Regionsprojets[]
     */
    public function getRegionprojetid(): Collection
    {
        return $this->regionprojetid;
    }

    public function addRegionprojetid(Regionsprojets $regionprojetid): self
    {
        if (!$this->regionprojetid->contains($regionprojetid)) {
            $this->regionprojetid[] = $regionprojetid;
        }

        return $this;
    }

    public function removeRegionprojetid(Regionsprojets $regionprojetid): self
    {
        if ($this->regionprojetid->contains($regionprojetid)) {
            $this->regionprojetid->removeElement($regionprojetid);
        }

        return $this;
    }

}
