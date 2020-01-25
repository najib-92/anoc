<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Histosuperviseurs
 *
 * @ORM\Table(name="histosuperviseurs")
 * @ORM\Entity
 */
class Histosuperviseurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="histosuperviseurid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $histosuperviseurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personnelid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $personnelid;

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

    public function getHistosuperviseurid(): ?int
    {
        return $this->histosuperviseurid;
    }

    public function getEleveurid(): ?string
    {
        return $this->eleveurid;
    }

    public function setEleveurid(?string $eleveurid): self
    {
        $this->eleveurid = $eleveurid;

        return $this;
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
