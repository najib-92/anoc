<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comptesrendusprospections
 *
 * @ORM\Table(name="comptesrendusprospections", indexes={@ORM\Index(name="fk_relationship_60", columns={"con_conventionid"})})
 * @ORM\Entity
 */
class Comptesrendusprospections
{
    /**
     * @var int
     *
     * @ORM\Column(name="compterenduprospectionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $compterenduprospectionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typecompterendu", type="text", length=65535, nullable=true)
     */
    private $typecompterendu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="theme", type="text", length=65535, nullable=true)
     */
    private $theme;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieu", type="text", length=65535, nullable=true)
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="animateur", type="text", length=65535, nullable=true)
     */
    private $animateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="participants", type="text", length=65535, nullable=true)
     */
    private $participants;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbrbeneficiaire", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nbrbeneficiaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectiviteterritoriale", type="text", length=65535, nullable=true)
     */
    private $collectiviteterritoriale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objectifs", type="text", length=65535, nullable=true)
     */
    private $objectifs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="methodeutilisee", type="text", length=65535, nullable=true)
     */
    private $methodeutilisee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="outilsutilises", type="text", length=65535, nullable=true)
     */
    private $outilsutilises;

    /**
     * @var string|null
     *
     * @ORM\Column(name="agentanoc", type="text", length=65535, nullable=true)
     */
    private $agentanoc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieuxvisites", type="text", length=65535, nullable=true)
     */
    private $lieuxvisites;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var \Conventions
     *
     * @ORM\ManyToOne(targetEntity="Conventions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="con_conventionid", referencedColumnName="conventionid")
     * })
     */
    private $conConventionid;

    public function getCompterenduprospectionid(): ?int
    {
        return $this->compterenduprospectionid;
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

    public function getTypecompterendu(): ?string
    {
        return $this->typecompterendu;
    }

    public function setTypecompterendu(?string $typecompterendu): self
    {
        $this->typecompterendu = $typecompterendu;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getAnimateur(): ?string
    {
        return $this->animateur;
    }

    public function setAnimateur(?string $animateur): self
    {
        $this->animateur = $animateur;

        return $this;
    }

    public function getParticipants(): ?string
    {
        return $this->participants;
    }

    public function setParticipants(?string $participants): self
    {
        $this->participants = $participants;

        return $this;
    }

    public function getNbrbeneficiaire(): ?string
    {
        return $this->nbrbeneficiaire;
    }

    public function setNbrbeneficiaire(?string $nbrbeneficiaire): self
    {
        $this->nbrbeneficiaire = $nbrbeneficiaire;

        return $this;
    }

    public function getCollectiviteterritoriale(): ?string
    {
        return $this->collectiviteterritoriale;
    }

    public function setCollectiviteterritoriale(?string $collectiviteterritoriale): self
    {
        $this->collectiviteterritoriale = $collectiviteterritoriale;

        return $this;
    }

    public function getObjectifs(): ?string
    {
        return $this->objectifs;
    }

    public function setObjectifs(?string $objectifs): self
    {
        $this->objectifs = $objectifs;

        return $this;
    }

    public function getMethodeutilisee(): ?string
    {
        return $this->methodeutilisee;
    }

    public function setMethodeutilisee(?string $methodeutilisee): self
    {
        $this->methodeutilisee = $methodeutilisee;

        return $this;
    }

    public function getOutilsutilises(): ?string
    {
        return $this->outilsutilises;
    }

    public function setOutilsutilises(?string $outilsutilises): self
    {
        $this->outilsutilises = $outilsutilises;

        return $this;
    }

    public function getAgentanoc(): ?string
    {
        return $this->agentanoc;
    }

    public function setAgentanoc(?string $agentanoc): self
    {
        $this->agentanoc = $agentanoc;

        return $this;
    }

    public function getLieuxvisites(): ?string
    {
        return $this->lieuxvisites;
    }

    public function setLieuxvisites(?string $lieuxvisites): self
    {
        $this->lieuxvisites = $lieuxvisites;

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

    public function getConConventionid(): ?Conventions
    {
        return $this->conConventionid;
    }

    public function setConConventionid(?Conventions $conConventionid): self
    {
        $this->conConventionid = $conConventionid;

        return $this;
    }


}
