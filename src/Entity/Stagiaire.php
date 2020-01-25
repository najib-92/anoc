<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stagiaire
 *
 * @ORM\Table(name="stagiaire")
 * @ORM\Entity
 */
class Stagiaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="stagiaireinterneid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stagiaireinterneid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomfr", type="text", length=65535, nullable=true)
     */
    private $nomfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomfr", type="text", length=65535, nullable=true)
     */
    private $prenomfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomar", type="text", length=65535, nullable=true)
     */
    private $nomar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomar", type="text", length=65535, nullable=true)
     */
    private $prenomar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcin", type="text", length=65535, nullable=true)
     */
    private $numcin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="filiere", type="text", length=65535, nullable=true)
     */
    private $filiere;

    /**
     * @var string|null
     *
     * @ORM\Column(name="niveau", type="text", length=65535, nullable=true)
     */
    private $niveau;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etablissement", type="text", length=65535, nullable=true)
     */
    private $etablissement;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datenaissance", type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datedebutstage", type="date", nullable=true)
     */
    private $datedebutstage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="encadrantecole", type="text", length=65535, nullable=true)
     */
    private $encadrantecole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=true)
     */
    private $email;

    public function getStagiaireinterneid(): ?int
    {
        return $this->stagiaireinterneid;
    }

    public function getNomfr(): ?string
    {
        return $this->nomfr;
    }

    public function setNomfr(?string $nomfr): self
    {
        $this->nomfr = $nomfr;

        return $this;
    }

    public function getPrenomfr(): ?string
    {
        return $this->prenomfr;
    }

    public function setPrenomfr(?string $prenomfr): self
    {
        $this->prenomfr = $prenomfr;

        return $this;
    }

    public function getNomar(): ?string
    {
        return $this->nomar;
    }

    public function setNomar(?string $nomar): self
    {
        $this->nomar = $nomar;

        return $this;
    }

    public function getPrenomar(): ?string
    {
        return $this->prenomar;
    }

    public function setPrenomar(?string $prenomar): self
    {
        $this->prenomar = $prenomar;

        return $this;
    }

    public function getNumcin(): ?string
    {
        return $this->numcin;
    }

    public function setNumcin(?string $numcin): self
    {
        $this->numcin = $numcin;

        return $this;
    }

    public function getFiliere(): ?string
    {
        return $this->filiere;
    }

    public function setFiliere(?string $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getEtablissement(): ?string
    {
        return $this->etablissement;
    }

    public function setEtablissement(?string $etablissement): self
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getDatedebutstage(): ?\DateTimeInterface
    {
        return $this->datedebutstage;
    }

    public function setDatedebutstage(?\DateTimeInterface $datedebutstage): self
    {
        $this->datedebutstage = $datedebutstage;

        return $this;
    }

    public function getEncadrantecole(): ?string
    {
        return $this->encadrantecole;
    }

    public function setEncadrantecole(?string $encadrantecole): self
    {
        $this->encadrantecole = $encadrantecole;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }


}
