<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compositiontroupeauxeleveursprospectes
 *
 * @ORM\Table(name="compositiontroupeauxeleveursprospectes")
 * @ORM\Entity
 */
class Compositiontroupeauxeleveursprospectes
{
    /**
     * @var int
     *
     * @ORM\Column(name="compositiontroupeaueleveurprospecteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $compositiontroupeaueleveurprospecteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurprospecteid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurprospecteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="espece", type="text", length=65535, nullable=true)
     */
    private $espece;

    /**
     * @var string|null
     *
     * @ORM\Column(name="race", type="text", length=65535, nullable=true)
     */
    private $race;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbrfemelleadultes", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nbrfemelleadultes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbrfemellesup6mois", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nbrfemellesup6mois;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbrmalessup6mois", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nbrmalessup6mois;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbrjeunesinf6mois", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nbrjeunesinf6mois;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbrmalesadultes", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nbrmalesadultes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $obs;

    public function getCompositiontroupeaueleveurprospecteid(): ?int
    {
        return $this->compositiontroupeaueleveurprospecteid;
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

    public function getEleveurprospecteid(): ?string
    {
        return $this->eleveurprospecteid;
    }

    public function setEleveurprospecteid(?string $eleveurprospecteid): self
    {
        $this->eleveurprospecteid = $eleveurprospecteid;

        return $this;
    }

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(?string $espece): self
    {
        $this->espece = $espece;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(?string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getNbrfemelleadultes(): ?string
    {
        return $this->nbrfemelleadultes;
    }

    public function setNbrfemelleadultes(?string $nbrfemelleadultes): self
    {
        $this->nbrfemelleadultes = $nbrfemelleadultes;

        return $this;
    }

    public function getNbrfemellesup6mois(): ?string
    {
        return $this->nbrfemellesup6mois;
    }

    public function setNbrfemellesup6mois(?string $nbrfemellesup6mois): self
    {
        $this->nbrfemellesup6mois = $nbrfemellesup6mois;

        return $this;
    }

    public function getNbrmalessup6mois(): ?string
    {
        return $this->nbrmalessup6mois;
    }

    public function setNbrmalessup6mois(?string $nbrmalessup6mois): self
    {
        $this->nbrmalessup6mois = $nbrmalessup6mois;

        return $this;
    }

    public function getNbrjeunesinf6mois(): ?string
    {
        return $this->nbrjeunesinf6mois;
    }

    public function setNbrjeunesinf6mois(?string $nbrjeunesinf6mois): self
    {
        $this->nbrjeunesinf6mois = $nbrjeunesinf6mois;

        return $this;
    }

    public function getNbrmalesadultes(): ?string
    {
        return $this->nbrmalesadultes;
    }

    public function setNbrmalesadultes(?string $nbrmalesadultes): self
    {
        $this->nbrmalesadultes = $nbrmalesadultes;

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


}
