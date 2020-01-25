<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conges
 *
 * @ORM\Table(name="conges")
 * @ORM\Entity
 */
class Conges
{
    /**
     * @var int
     *
     * @ORM\Column(name="congeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $congeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personnelid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $personnelid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="natureconge", type="text", length=65535, nullable=true)
     */
    private $natureconge;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datedecision", type="date", nullable=true)
     */
    private $datedecision;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datedepart", type="date", nullable=true)
     */
    private $datedepart;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateretour", type="date", nullable=true)
     */
    private $dateretour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbjourdemande", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nbjourdemande;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbjouraccorde", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nbjouraccorde;

    /**
     * @var string|null
     *
     * @ORM\Column(name="congeautitreannee", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $congeautitreannee;

    public function getCongeid(): ?int
    {
        return $this->congeid;
    }

    public function getPersonnelid(): ?string
    {
        return $this->personnelid;
    }

    public function setPersonnelid(?string $personnelid): self
    {
        $this->personnelid = $personnelid;

        return $this;
    }

    public function getNatureconge(): ?string
    {
        return $this->natureconge;
    }

    public function setNatureconge(?string $natureconge): self
    {
        $this->natureconge = $natureconge;

        return $this;
    }

    public function getDatedecision(): ?\DateTimeInterface
    {
        return $this->datedecision;
    }

    public function setDatedecision(?\DateTimeInterface $datedecision): self
    {
        $this->datedecision = $datedecision;

        return $this;
    }

    public function getDatedepart(): ?\DateTimeInterface
    {
        return $this->datedepart;
    }

    public function setDatedepart(?\DateTimeInterface $datedepart): self
    {
        $this->datedepart = $datedepart;

        return $this;
    }

    public function getDateretour(): ?\DateTimeInterface
    {
        return $this->dateretour;
    }

    public function setDateretour(?\DateTimeInterface $dateretour): self
    {
        $this->dateretour = $dateretour;

        return $this;
    }

    public function getNbjourdemande(): ?string
    {
        return $this->nbjourdemande;
    }

    public function setNbjourdemande(?string $nbjourdemande): self
    {
        $this->nbjourdemande = $nbjourdemande;

        return $this;
    }

    public function getNbjouraccorde(): ?string
    {
        return $this->nbjouraccorde;
    }

    public function setNbjouraccorde(?string $nbjouraccorde): self
    {
        $this->nbjouraccorde = $nbjouraccorde;

        return $this;
    }

    public function getCongeautitreannee(): ?string
    {
        return $this->congeautitreannee;
    }

    public function setCongeautitreannee(?string $congeautitreannee): self
    {
        $this->congeautitreannee = $congeautitreannee;

        return $this;
    }


}
