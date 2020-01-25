<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Partenairesconventions
 *
 * @ORM\Table(name="partenairesconventions")
 * @ORM\Entity
 */
class Partenairesconventions
{
    /**
     * @var int
     *
     * @ORM\Column(name="partenaireconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $partenaireconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="partenaire", type="text", length=65535, nullable=true)
     */
    private $partenaire;

    /**
     * @var float|null
     *
     * @ORM\Column(name="contribution", type="float", precision=10, scale=0, nullable=true)
     */
    private $contribution;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ribversement", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $ribversement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="banque", type="text", length=65535, nullable=true)
     */
    private $banque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="agencebancaire", type="text", length=65535, nullable=true)
     */
    private $agencebancaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resultatfinal", type="text", length=65535, nullable=true)
     */
    private $resultatfinal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Conventions", mappedBy="partenaireconventionid")
     */
    private $conventionid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Versementscontributions", mappedBy="partenaireconventionid")
     */
    private $versementcontributionid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conventionid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->versementcontributionid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getPartenaireconventionid(): ?int
    {
        return $this->partenaireconventionid;
    }

    public function getPartenaire(): ?string
    {
        return $this->partenaire;
    }

    public function setPartenaire(?string $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    public function getContribution(): ?float
    {
        return $this->contribution;
    }

    public function setContribution(?float $contribution): self
    {
        $this->contribution = $contribution;

        return $this;
    }

    public function getRibversement(): ?string
    {
        return $this->ribversement;
    }

    public function setRibversement(?string $ribversement): self
    {
        $this->ribversement = $ribversement;

        return $this;
    }

    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): self
    {
        $this->banque = $banque;

        return $this;
    }

    public function getAgencebancaire(): ?string
    {
        return $this->agencebancaire;
    }

    public function setAgencebancaire(?string $agencebancaire): self
    {
        $this->agencebancaire = $agencebancaire;

        return $this;
    }

    public function getResultatfinal(): ?string
    {
        return $this->resultatfinal;
    }

    public function setResultatfinal(?string $resultatfinal): self
    {
        $this->resultatfinal = $resultatfinal;

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
            $conventionid->addPartenaireconventionid($this);
        }

        return $this;
    }

    public function removeConventionid(Conventions $conventionid): self
    {
        if ($this->conventionid->contains($conventionid)) {
            $this->conventionid->removeElement($conventionid);
            $conventionid->removePartenaireconventionid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Versementscontributions[]
     */
    public function getVersementcontributionid(): Collection
    {
        return $this->versementcontributionid;
    }

    public function addVersementcontributionid(Versementscontributions $versementcontributionid): self
    {
        if (!$this->versementcontributionid->contains($versementcontributionid)) {
            $this->versementcontributionid[] = $versementcontributionid;
            $versementcontributionid->addPartenaireconventionid($this);
        }

        return $this;
    }

    public function removeVersementcontributionid(Versementscontributions $versementcontributionid): self
    {
        if ($this->versementcontributionid->contains($versementcontributionid)) {
            $this->versementcontributionid->removeElement($versementcontributionid);
            $versementcontributionid->removePartenaireconventionid($this);
        }

        return $this;
    }

}
