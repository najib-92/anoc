<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projets
 *
 * @ORM\Table(name="projets")
 * @ORM\Entity
 */
class Projets
{
    /**
     * @var int
     *
     * @ORM\Column(name="projetid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projetid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomprojet", type="text", length=65535, nullable=true)
     */
    private $nomprojet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objetprojet", type="text", length=65535, nullable=true)
     */
    private $objetprojet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secteurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $secteurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelancement", type="date", nullable=true)
     */
    private $datelancement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dureeenmois", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $dureeenmois;

    /**
     * @var string|null
     *
     * @ORM\Column(name="arretenmois", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $arretenmois;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datefin", type="date", nullable=true)
     */
    private $datefin;

    /**
     * @var float|null
     *
     * @ORM\Column(name="contributionanoc", type="float", precision=10, scale=0, nullable=true)
     */
    private $contributionanoc;

    /**
     * @var float|null
     *
     * @ORM\Column(name="contributionpartenaire", type="float", precision=10, scale=0, nullable=true)
     */
    private $contributionpartenaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objetabrege", type="text", length=65535, nullable=true)
     */
    private $objetabrege;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cadreprojet", type="text", length=65535, nullable=true)
     */
    private $cadreprojet;

    public function getProjetid(): ?int
    {
        return $this->projetid;
    }

    public function getNomprojet(): ?string
    {
        return $this->nomprojet;
    }

    public function setNomprojet(?string $nomprojet): self
    {
        $this->nomprojet = $nomprojet;

        return $this;
    }

    public function getObjetprojet(): ?string
    {
        return $this->objetprojet;
    }

    public function setObjetprojet(?string $objetprojet): self
    {
        $this->objetprojet = $objetprojet;

        return $this;
    }

    public function getSecteurid(): ?string
    {
        return $this->secteurid;
    }

    public function setSecteurid(?string $secteurid): self
    {
        $this->secteurid = $secteurid;

        return $this;
    }

    public function getConventionid(): ?string
    {
        return $this->conventionid;
    }

    public function setConventionid(?string $conventionid): self
    {
        $this->conventionid = $conventionid;

        return $this;
    }

    public function getDatelancement(): ?\DateTimeInterface
    {
        return $this->datelancement;
    }

    public function setDatelancement(?\DateTimeInterface $datelancement): self
    {
        $this->datelancement = $datelancement;

        return $this;
    }

    public function getDureeenmois(): ?string
    {
        return $this->dureeenmois;
    }

    public function setDureeenmois(?string $dureeenmois): self
    {
        $this->dureeenmois = $dureeenmois;

        return $this;
    }

    public function getArretenmois(): ?string
    {
        return $this->arretenmois;
    }

    public function setArretenmois(?string $arretenmois): self
    {
        $this->arretenmois = $arretenmois;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(?\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getContributionanoc(): ?float
    {
        return $this->contributionanoc;
    }

    public function setContributionanoc(?float $contributionanoc): self
    {
        $this->contributionanoc = $contributionanoc;

        return $this;
    }

    public function getContributionpartenaire(): ?float
    {
        return $this->contributionpartenaire;
    }

    public function setContributionpartenaire(?float $contributionpartenaire): self
    {
        $this->contributionpartenaire = $contributionpartenaire;

        return $this;
    }

    public function getObjetabrege(): ?string
    {
        return $this->objetabrege;
    }

    public function setObjetabrege(?string $objetabrege): self
    {
        $this->objetabrege = $objetabrege;

        return $this;
    }

    public function getCadreprojet(): ?string
    {
        return $this->cadreprojet;
    }

    public function setCadreprojet(?string $cadreprojet): self
    {
        $this->cadreprojet = $cadreprojet;

        return $this;
    }


}
