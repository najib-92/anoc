<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Versementscontributions
 *
 * @ORM\Table(name="versementscontributions", indexes={@ORM\Index(name="fk_relationship_67", columns={"conventionid"})})
 * @ORM\Entity
 */
class Versementscontributions
{
    /**
     * @var int
     *
     * @ORM\Column(name="versementcontributionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $versementcontributionid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateecheance", type="date", nullable=true)
     */
    private $dateecheance;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbrjours", type="integer", nullable=true)
     */
    private $nbrjours;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantaversser", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantaversser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="faitgenerateur", type="text", length=65535, nullable=true)
     */
    private $faitgenerateur;

    /**
     * @var float|null
     *
     * @ORM\Column(name="porcentagemontantconvention", type="float", precision=10, scale=0, nullable=true)
     */
    private $porcentagemontantconvention;

    /**
     * @var \Conventions
     *
     * @ORM\ManyToOne(targetEntity="Conventions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conventionid", referencedColumnName="conventionid")
     * })
     */
    private $conventionid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Partenairesconventions", inversedBy="versementcontributionid")
     * @ORM\JoinTable(name="relationship_69",
     *   joinColumns={
     *     @ORM\JoinColumn(name="versementcontributionid", referencedColumnName="versementcontributionid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="partenaireconventionid", referencedColumnName="partenaireconventionid")
     *   }
     * )
     */
    private $partenaireconventionid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->partenaireconventionid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getVersementcontributionid(): ?int
    {
        return $this->versementcontributionid;
    }

    public function getDateecheance(): ?\DateTimeInterface
    {
        return $this->dateecheance;
    }

    public function setDateecheance(?\DateTimeInterface $dateecheance): self
    {
        $this->dateecheance = $dateecheance;

        return $this;
    }

    public function getNbrjours(): ?int
    {
        return $this->nbrjours;
    }

    public function setNbrjours(?int $nbrjours): self
    {
        $this->nbrjours = $nbrjours;

        return $this;
    }

    public function getMontantaversser(): ?float
    {
        return $this->montantaversser;
    }

    public function setMontantaversser(?float $montantaversser): self
    {
        $this->montantaversser = $montantaversser;

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

    public function getFaitgenerateur(): ?string
    {
        return $this->faitgenerateur;
    }

    public function setFaitgenerateur(?string $faitgenerateur): self
    {
        $this->faitgenerateur = $faitgenerateur;

        return $this;
    }

    public function getPorcentagemontantconvention(): ?float
    {
        return $this->porcentagemontantconvention;
    }

    public function setPorcentagemontantconvention(?float $porcentagemontantconvention): self
    {
        $this->porcentagemontantconvention = $porcentagemontantconvention;

        return $this;
    }

    public function getConventionid(): ?Conventions
    {
        return $this->conventionid;
    }

    public function setConventionid(?Conventions $conventionid): self
    {
        $this->conventionid = $conventionid;

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

}
