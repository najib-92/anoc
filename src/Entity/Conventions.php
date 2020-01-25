<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Conventions
 *
 * @ORM\Table(name="conventions")
 * @ORM\Entity
 */
class Conventions
{
    /**
     * @var int
     *
     * @ORM\Column(name="conventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numconvention", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $numconvention;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datesignatureconvention", type="date", nullable=true)
     */
    private $datesignatureconvention;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dureconvention", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $dureconvention;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateordreservicecommencer", type="date", nullable=true)
     */
    private $dateordreservicecommencer;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montanttotalconvention", type="float", precision=10, scale=0, nullable=true)
     */
    private $montanttotalconvention;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateresiliation", type="date", nullable=true)
     */
    private $dateresiliation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motifresiliation", type="text", length=65535, nullable=true)
     */
    private $motifresiliation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Activitesconventions", inversedBy="conventionid")
     * @ORM\JoinTable(name="relationship_61",
     *   joinColumns={
     *     @ORM\JoinColumn(name="conventionid", referencedColumnName="conventionid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="activiteconventionid", referencedColumnName="activiteconventionid")
     *   }
     * )
     */
    private $activiteconventionid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Partenairesconventions", inversedBy="conventionid")
     * @ORM\JoinTable(name="relationship_62",
     *   joinColumns={
     *     @ORM\JoinColumn(name="conventionid", referencedColumnName="conventionid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="partenaireconventionid", referencedColumnName="partenaireconventionid")
     *   }
     * )
     */
    private $partenaireconventionid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Objectifsdesconventions", inversedBy="conventionid")
     * @ORM\JoinTable(name="relationship_63",
     *   joinColumns={
     *     @ORM\JoinColumn(name="conventionid", referencedColumnName="conventionid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="objectifdeconventionid", referencedColumnName="objectifdeconventionid")
     *   }
     * )
     */
    private $objectifdeconventionid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activiteconventionid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->partenaireconventionid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->objectifdeconventionid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getConventionid(): ?int
    {
        return $this->conventionid;
    }

    public function getNumconvention(): ?string
    {
        return $this->numconvention;
    }

    public function setNumconvention(?string $numconvention): self
    {
        $this->numconvention = $numconvention;

        return $this;
    }

    public function getDatesignatureconvention(): ?\DateTimeInterface
    {
        return $this->datesignatureconvention;
    }

    public function setDatesignatureconvention(?\DateTimeInterface $datesignatureconvention): self
    {
        $this->datesignatureconvention = $datesignatureconvention;

        return $this;
    }

    public function getDureconvention(): ?string
    {
        return $this->dureconvention;
    }

    public function setDureconvention(?string $dureconvention): self
    {
        $this->dureconvention = $dureconvention;

        return $this;
    }

    public function getDateordreservicecommencer(): ?\DateTimeInterface
    {
        return $this->dateordreservicecommencer;
    }

    public function setDateordreservicecommencer(?\DateTimeInterface $dateordreservicecommencer): self
    {
        $this->dateordreservicecommencer = $dateordreservicecommencer;

        return $this;
    }

    public function getMontanttotalconvention(): ?float
    {
        return $this->montanttotalconvention;
    }

    public function setMontanttotalconvention(?float $montanttotalconvention): self
    {
        $this->montanttotalconvention = $montanttotalconvention;

        return $this;
    }

    public function getDateresiliation(): ?\DateTimeInterface
    {
        return $this->dateresiliation;
    }

    public function setDateresiliation(?\DateTimeInterface $dateresiliation): self
    {
        $this->dateresiliation = $dateresiliation;

        return $this;
    }

    public function getMotifresiliation(): ?string
    {
        return $this->motifresiliation;
    }

    public function setMotifresiliation(?string $motifresiliation): self
    {
        $this->motifresiliation = $motifresiliation;

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
     * @return Collection|Activitesconventions[]
     */
    public function getActiviteconventionid(): Collection
    {
        return $this->activiteconventionid;
    }

    public function addActiviteconventionid(Activitesconventions $activiteconventionid): self
    {
        if (!$this->activiteconventionid->contains($activiteconventionid)) {
            $this->activiteconventionid[] = $activiteconventionid;
        }

        return $this;
    }

    public function removeActiviteconventionid(Activitesconventions $activiteconventionid): self
    {
        if ($this->activiteconventionid->contains($activiteconventionid)) {
            $this->activiteconventionid->removeElement($activiteconventionid);
        }

        return $this;
    }

    /**
     * @return Collection|Partenairesconventions[]
     */
    public function getPartenaireconventionid(): Collection
    {
        return $this->partenaireconventionid;
    }

    public function addPartenaireconventionid(Partenairesconventions $partenaireconventionid): self
    {
        if (!$this->partenaireconventionid->contains($partenaireconventionid)) {
            $this->partenaireconventionid[] = $partenaireconventionid;
        }

        return $this;
    }

    public function removePartenaireconventionid(Partenairesconventions $partenaireconventionid): self
    {
        if ($this->partenaireconventionid->contains($partenaireconventionid)) {
            $this->partenaireconventionid->removeElement($partenaireconventionid);
        }

        return $this;
    }

    /**
     * @return Collection|Objectifsdesconventions[]
     */
    public function getObjectifdeconventionid(): Collection
    {
        return $this->objectifdeconventionid;
    }

    public function addObjectifdeconventionid(Objectifsdesconventions $objectifdeconventionid): self
    {
        if (!$this->objectifdeconventionid->contains($objectifdeconventionid)) {
            $this->objectifdeconventionid[] = $objectifdeconventionid;
        }

        return $this;
    }

    public function removeObjectifdeconventionid(Objectifsdesconventions $objectifdeconventionid): self
    {
        if ($this->objectifdeconventionid->contains($objectifdeconventionid)) {
            $this->objectifdeconventionid->removeElement($objectifdeconventionid);
        }

        return $this;
    }

}
