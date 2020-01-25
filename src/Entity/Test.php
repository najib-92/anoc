<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test", indexes={@ORM\Index(name="fk_relationship_80", columns={"eleveurid"}), @ORM\Index(name="fk_relationship_82", columns={"technicienid"}), @ORM\Index(name="fk_relationship_59", columns={"groupementid"}), @ORM\Index(name="fk_relationship_81", columns={"secteurid"})})
 * @ORM\Entity
 */
class Test
{
    /**
     * @var int
     *
     * @ORM\Column(name="eleveurpaiementdroitid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eleveurpaiementdroitid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="groupementid", type="integer", nullable=true)
     */
    private $groupementid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="secteurid", type="integer", nullable=true)
     */
    private $secteurid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="technicienid", type="integer", nullable=true)
     */
    private $technicienid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="eleveurid", type="integer", nullable=true)
     */
    private $eleveurid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datepaiement", type="datetime", nullable=true)
     */
    private $datepaiement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantdroitfonctionement", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantdroitfonctionement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantdroitcotisation", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantdroitcotisation;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantautredroit", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantautredroit;

    /**
     * @var float|null
     *
     * @ORM\Column(name="droitdelannee", type="float", precision=10, scale=0, nullable=true)
     */
    private $droitdelannee;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbfemelleovin", type="integer", nullable=true)
     */
    private $nbfemelleovin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbfemellecaprin", type="integer", nullable=true)
     */
    private $nbfemellecaprin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numerorecu", type="integer", nullable=true)
     */
    private $numerorecu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="daterecu", type="date", nullable=true)
     */
    private $daterecu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="montantrecu", type="integer", nullable=true)
     */
    private $montantrecu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="annee", type="date", nullable=true)
     */
    private $annee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="string", length=255, nullable=true)
     */
    private $obs;

    public function getEleveurpaiementdroitid(): ?int
    {
        return $this->eleveurpaiementdroitid;
    }

    public function getGroupementid(): ?int
    {
        return $this->groupementid;
    }

    public function setGroupementid(?int $groupementid): self
    {
        $this->groupementid = $groupementid;

        return $this;
    }

    public function getSecteurid(): ?int
    {
        return $this->secteurid;
    }

    public function setSecteurid(?int $secteurid): self
    {
        $this->secteurid = $secteurid;

        return $this;
    }

    public function getTechnicienid(): ?int
    {
        return $this->technicienid;
    }

    public function setTechnicienid(?int $technicienid): self
    {
        $this->technicienid = $technicienid;

        return $this;
    }

    public function getEleveurid(): ?int
    {
        return $this->eleveurid;
    }

    public function setEleveurid(?int $eleveurid): self
    {
        $this->eleveurid = $eleveurid;

        return $this;
    }

    public function getDatepaiement(): ?\DateTimeInterface
    {
        return $this->datepaiement;
    }

    public function setDatepaiement(?\DateTimeInterface $datepaiement): self
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    public function getMontantdroitfonctionement(): ?float
    {
        return $this->montantdroitfonctionement;
    }

    public function setMontantdroitfonctionement(?float $montantdroitfonctionement): self
    {
        $this->montantdroitfonctionement = $montantdroitfonctionement;

        return $this;
    }

    public function getMontantdroitcotisation(): ?float
    {
        return $this->montantdroitcotisation;
    }

    public function setMontantdroitcotisation(?float $montantdroitcotisation): self
    {
        $this->montantdroitcotisation = $montantdroitcotisation;

        return $this;
    }

    public function getMontantautredroit(): ?float
    {
        return $this->montantautredroit;
    }

    public function setMontantautredroit(?float $montantautredroit): self
    {
        $this->montantautredroit = $montantautredroit;

        return $this;
    }

    public function getDroitdelannee(): ?float
    {
        return $this->droitdelannee;
    }

    public function setDroitdelannee(?float $droitdelannee): self
    {
        $this->droitdelannee = $droitdelannee;

        return $this;
    }

    public function getNbfemelleovin(): ?int
    {
        return $this->nbfemelleovin;
    }

    public function setNbfemelleovin(?int $nbfemelleovin): self
    {
        $this->nbfemelleovin = $nbfemelleovin;

        return $this;
    }

    public function getNbfemellecaprin(): ?int
    {
        return $this->nbfemellecaprin;
    }

    public function setNbfemellecaprin(?int $nbfemellecaprin): self
    {
        $this->nbfemellecaprin = $nbfemellecaprin;

        return $this;
    }

    public function getNumerorecu(): ?int
    {
        return $this->numerorecu;
    }

    public function setNumerorecu(?int $numerorecu): self
    {
        $this->numerorecu = $numerorecu;

        return $this;
    }

    public function getDaterecu(): ?\DateTimeInterface
    {
        return $this->daterecu;
    }

    public function setDaterecu(?\DateTimeInterface $daterecu): self
    {
        $this->daterecu = $daterecu;

        return $this;
    }

    public function getMontantrecu(): ?int
    {
        return $this->montantrecu;
    }

    public function setMontantrecu(?int $montantrecu): self
    {
        $this->montantrecu = $montantrecu;

        return $this;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(?\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

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
