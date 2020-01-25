<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Droitsfinanciersgrpt
 *
 * @ORM\Table(name="droitsfinanciersgrpt", indexes={@ORM\Index(name="fk_relationship_31", columns={"groupementid"})})
 * @ORM\Entity
 */
class Droitsfinanciersgrpt
{
    /**
     * @var int
     *
     * @ORM\Column(name="droitsfinanciersgrptid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $droitsfinanciersgrptid;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=true)
     */
    private $montant;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datedebut", type="date", nullable=true)
     */
    private $datedebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datefin", type="date", nullable=true)
     */
    private $datefin;

    /**
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    public function getDroitsfinanciersgrptid(): ?int
    {
        return $this->droitsfinanciersgrptid;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(?\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

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

    public function getGroupementid(): ?Groupements
    {
        return $this->groupementid;
    }

    public function setGroupementid(?Groupements $groupementid): self
    {
        $this->groupementid = $groupementid;

        return $this;
    }


}
