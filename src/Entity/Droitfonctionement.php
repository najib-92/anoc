<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Droitfonctionement
 *
 * @ORM\Table(name="droitfonctionement", indexes={@ORM\Index(name="fk_relationship_17", columns={"secteurid"})})
 * @ORM\Entity
 */
class Droitfonctionement
{
    /**
     * @var int
     *
     * @ORM\Column(name="droitfonctionementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $droitfonctionementid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="anneefonctionement", type="date", nullable=true)
     */
    private $anneefonctionement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantpaye", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantpaye;

    /**
     * @var \Secteurs
     *
     * @ORM\ManyToOne(targetEntity="Secteurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="secteurid", referencedColumnName="secteurid")
     * })
     */
    private $secteurid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Groupements", mappedBy="droitfonctionementid")
     */
    private $groupementid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Eleveurs", mappedBy="droitfonctionementid")
     */
    private $eleveurid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupementid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eleveurid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getDroitfonctionementid(): ?int
    {
        return $this->droitfonctionementid;
    }

    public function getAnneefonctionement(): ?\DateTimeInterface
    {
        return $this->anneefonctionement;
    }

    public function setAnneefonctionement(?\DateTimeInterface $anneefonctionement): self
    {
        $this->anneefonctionement = $anneefonctionement;

        return $this;
    }

    public function getMontantpaye(): ?float
    {
        return $this->montantpaye;
    }

    public function setMontantpaye(?float $montantpaye): self
    {
        $this->montantpaye = $montantpaye;

        return $this;
    }

    public function getSecteurid(): ?Secteurs
    {
        return $this->secteurid;
    }

    public function setSecteurid(?Secteurs $secteurid): self
    {
        $this->secteurid = $secteurid;

        return $this;
    }

    /**
     * @return Collection|Groupements[]
     */
    public function getGroupementid(): Collection
    {
        return $this->groupementid;
    }

    public function addGroupementid(Groupements $groupementid): self
    {
        if (!$this->groupementid->contains($groupementid)) {
            $this->groupementid[] = $groupementid;
            $groupementid->addDroitfonctionementid($this);
        }

        return $this;
    }

    public function removeGroupementid(Groupements $groupementid): self
    {
        if ($this->groupementid->contains($groupementid)) {
            $this->groupementid->removeElement($groupementid);
            $groupementid->removeDroitfonctionementid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Eleveurs[]
     */
    public function getEleveurid(): Collection
    {
        return $this->eleveurid;
    }

    public function addEleveurid(Eleveurs $eleveurid): self
    {
        if (!$this->eleveurid->contains($eleveurid)) {
            $this->eleveurid[] = $eleveurid;
            $eleveurid->addDroitfonctionementid($this);
        }

        return $this;
    }

    public function removeEleveurid(Eleveurs $eleveurid): self
    {
        if ($this->eleveurid->contains($eleveurid)) {
            $this->eleveurid->removeElement($eleveurid);
            $eleveurid->removeDroitfonctionementid($this);
        }

        return $this;
    }

}
