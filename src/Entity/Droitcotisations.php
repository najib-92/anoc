<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Droitcotisations
 *
 * @ORM\Table(name="droitcotisations")
 * @ORM\Entity
 */
class Droitcotisations
{
    /**
     * @var int
     *
     * @ORM\Column(name="droitcotisationsid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $droitcotisationsid;

    /**
     * @var float|null
     *
     * @ORM\Column(name="mantant", type="float", precision=10, scale=0, nullable=true)
     */
    private $mantant;

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

    public function getDroitcotisationsid(): ?int
    {
        return $this->droitcotisationsid;
    }

    public function getMantant(): ?float
    {
        return $this->mantant;
    }

    public function setMantant(?float $mantant): self
    {
        $this->mantant = $mantant;

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


}
