<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recusdepaiement
 *
 * @ORM\Table(name="recusdepaiement", indexes={@ORM\Index(name="fk_relationship_79", columns={"technicienid"}), @ORM\Index(name="fk_relationship_30", columns={"eleveurid"})})
 * @ORM\Entity
 */
class Recusdepaiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="recusdepaiementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recusdepaiementid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numrecu", type="integer", nullable=true)
     */
    private $numrecu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="daterecu", type="date", nullable=true)
     */
    private $daterecu;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantrecu", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantrecu;

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
     * @var \Techniciens
     *
     * @ORM\ManyToOne(targetEntity="Techniciens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="technicienid", referencedColumnName="technicienid")
     * })
     */
    private $technicienid;

    public function getRecusdepaiementid(): ?int
    {
        return $this->recusdepaiementid;
    }

    public function getNumrecu(): ?int
    {
        return $this->numrecu;
    }

    public function setNumrecu(?int $numrecu): self
    {
        $this->numrecu = $numrecu;

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

    public function getMontantrecu(): ?float
    {
        return $this->montantrecu;
    }

    public function setMontantrecu(?float $montantrecu): self
    {
        $this->montantrecu = $montantrecu;

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
