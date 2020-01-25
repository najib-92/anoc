<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dossiereleveurs
 *
 * @ORM\Table(name="dossiereleveurs", indexes={@ORM\Index(name="fk_relationship_84", columns={"personnelid"}), @ORM\Index(name="fk_relationship_86", columns={"groupementid"}), @ORM\Index(name="fk_relationship_83", columns={"eleveurid"}), @ORM\Index(name="fk_relationship_85", columns={"secteurid"}), @ORM\Index(name="fk_relationship_87", columns={"technicienid"})})
 * @ORM\Entity
 */
class Dossiereleveurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="dossiereleveursid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dossiereleveursid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomdocument", type="string", length=255, nullable=true)
     */
    private $nomdocument;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateheur", type="datetime", nullable=true)
     */
    private $dateheur;

    /**
     * @var \Eleveurs
     *
     * @ORM\ManyToOne(targetEntity="Eleveurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="eleveurid", referencedColumnName="eleveurid")
     * })
     */
    private $eleveurid;

    /**
     * @var \Personnel
     *
     * @ORM\ManyToOne(targetEntity="Personnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personnelid", referencedColumnName="personnelid")
     * })
     */
    private $personnelid;

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
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    /**
     * @var \Techniciens
     *
     * @ORM\ManyToOne(targetEntity="Techniciens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="technicienid", referencedColumnName="technicienid")
     * })
     */
    private $technicienid;

    public function getDossiereleveursid(): ?int
    {
        return $this->dossiereleveursid;
    }

    public function getNomdocument(): ?string
    {
        return $this->nomdocument;
    }

    public function setNomdocument(?string $nomdocument): self
    {
        $this->nomdocument = $nomdocument;

        return $this;
    }

    public function getDateheur(): ?\DateTimeInterface
    {
        return $this->dateheur;
    }

    public function setDateheur(?\DateTimeInterface $dateheur): self
    {
        $this->dateheur = $dateheur;

        return $this;
    }

    public function getEleveurid(): ?Eleveurs
    {
        return $this->eleveurid;
    }

    public function setEleveurid(?Eleveurs $eleveurid): self
    {
        $this->eleveurid = $eleveurid;

        return $this;
    }

    public function getPersonnelid(): ?Personnel
    {
        return $this->personnelid;
    }

    public function setPersonnelid(?Personnel $personnelid): self
    {
        $this->personnelid = $personnelid;

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

    public function getGroupementid(): ?Groupements
    {
        return $this->groupementid;
    }

    public function setGroupementid(?Groupements $groupementid): self
    {
        $this->groupementid = $groupementid;

        return $this;
    }

    public function getTechnicienid(): ?Techniciens
    {
        return $this->technicienid;
    }

    public function setTechnicienid(?Techniciens $technicienid): self
    {
        $this->technicienid = $technicienid;

        return $this;
    }


}
