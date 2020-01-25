<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiementchargesgroupements
 *
 * @ORM\Table(name="paiementchargesgroupements")
 * @ORM\Entity
 */
class Paiementchargesgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="paiementchargegroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $paiementchargegroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

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
     * @var float|null
     *
     * @ORM\Column(name="montanttotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $montanttotal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="chequenum", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $chequenum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="banque", type="text", length=65535, nullable=true)
     */
    private $banque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getPaiementchargegroupementid(): ?int
    {
        return $this->paiementchargegroupementid;
    }

    public function getGroupementid(): ?string
    {
        return $this->groupementid;
    }

    public function setGroupementid(?string $groupementid): self
    {
        $this->groupementid = $groupementid;

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

    public function getMontanttotal(): ?float
    {
        return $this->montanttotal;
    }

    public function setMontanttotal(?float $montanttotal): self
    {
        $this->montanttotal = $montanttotal;

        return $this;
    }

    public function getChequenum(): ?string
    {
        return $this->chequenum;
    }

    public function setChequenum(?string $chequenum): self
    {
        $this->chequenum = $chequenum;

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
