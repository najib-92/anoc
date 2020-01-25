<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absences
 *
 * @ORM\Table(name="absences")
 * @ORM\Entity
 */
class Absences
{
    /**
     * @var int
     *
     * @ORM\Column(name="absenceid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $absenceid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personnelid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $personnelid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="debutabsence", type="date", nullable=true)
     */
    private $debutabsence;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="finabsence", type="date", nullable=true)
     */
    private $finabsence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motif", type="text", length=65535, nullable=true)
     */
    private $motif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getAbsenceid(): ?int
    {
        return $this->absenceid;
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

    public function getDebutabsence(): ?\DateTimeInterface
    {
        return $this->debutabsence;
    }

    public function setDebutabsence(?\DateTimeInterface $debutabsence): self
    {
        $this->debutabsence = $debutabsence;

        return $this;
    }

    public function getFinabsence(): ?\DateTimeInterface
    {
        return $this->finabsence;
    }

    public function setFinabsence(?\DateTimeInterface $finabsence): self
    {
        $this->finabsence = $finabsence;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

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
