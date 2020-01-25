<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comptesuiviconvention
 *
 * @ORM\Table(name="comptesuiviconvention")
 * @ORM\Entity
 */
class Comptesuiviconvention
{
    /**
     * @var int
     *
     * @ORM\Column(name="comptesuiviconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $comptesuiviconventionid;

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
     * @ORM\Column(name="organisme", type="text", length=65535, nullable=true)
     */
    private $organisme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="posteorganiste", type="text", length=65535, nullable=true)
     */
    private $posteorganiste;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postecomite", type="text", length=65535, nullable=true)
     */
    private $postecomite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="text", length=65535, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gsm1", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $gsm1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gsm2", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $gsm2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telfixe", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $telfixe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $fax;

    public function getComptesuiviconventionid(): ?int
    {
        return $this->comptesuiviconventionid;
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

    public function getOrganisme(): ?string
    {
        return $this->organisme;
    }

    public function setOrganisme(?string $organisme): self
    {
        $this->organisme = $organisme;

        return $this;
    }

    public function getPosteorganiste(): ?string
    {
        return $this->posteorganiste;
    }

    public function setPosteorganiste(?string $posteorganiste): self
    {
        $this->posteorganiste = $posteorganiste;

        return $this;
    }

    public function getPostecomite(): ?string
    {
        return $this->postecomite;
    }

    public function setPostecomite(?string $postecomite): self
    {
        $this->postecomite = $postecomite;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getGsm1(): ?string
    {
        return $this->gsm1;
    }

    public function setGsm1(?string $gsm1): self
    {
        $this->gsm1 = $gsm1;

        return $this;
    }

    public function getGsm2(): ?string
    {
        return $this->gsm2;
    }

    public function setGsm2(?string $gsm2): self
    {
        $this->gsm2 = $gsm2;

        return $this;
    }

    public function getTelfixe(): ?string
    {
        return $this->telfixe;
    }

    public function setTelfixe(?string $telfixe): self
    {
        $this->telfixe = $telfixe;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }


}
