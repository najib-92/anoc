<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reunionscomitesconventions
 *
 * @ORM\Table(name="reunionscomitesconventions")
 * @ORM\Entity
 */
class Reunionscomitesconventions
{
    /**
     * @var int
     *
     * @ORM\Column(name="reunioncomiteconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reunioncomiteconventionid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datereunion", type="date", nullable=true)
     */
    private $datereunion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objetreunion", type="text", length=65535, nullable=true)
     */
    private $objetreunion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ordrejour", type="text", length=65535, nullable=true)
     */
    private $ordrejour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="compterendu", type="text", length=65535, nullable=true)
     */
    private $compterendu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="listepresents", type="text", length=65535, nullable=true)
     */
    private $listepresents;

    /**
     * @var string|null
     *
     * @ORM\Column(name="listeabsents", type="text", length=65535, nullable=true)
     */
    private $listeabsents;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getReunioncomiteconventionid(): ?int
    {
        return $this->reunioncomiteconventionid;
    }

    public function getDatereunion(): ?\DateTimeInterface
    {
        return $this->datereunion;
    }

    public function setDatereunion(?\DateTimeInterface $datereunion): self
    {
        $this->datereunion = $datereunion;

        return $this;
    }

    public function getObjetreunion(): ?string
    {
        return $this->objetreunion;
    }

    public function setObjetreunion(?string $objetreunion): self
    {
        $this->objetreunion = $objetreunion;

        return $this;
    }

    public function getOrdrejour(): ?string
    {
        return $this->ordrejour;
    }

    public function setOrdrejour(?string $ordrejour): self
    {
        $this->ordrejour = $ordrejour;

        return $this;
    }

    public function getCompterendu(): ?string
    {
        return $this->compterendu;
    }

    public function setCompterendu(?string $compterendu): self
    {
        $this->compterendu = $compterendu;

        return $this;
    }

    public function getListepresents(): ?string
    {
        return $this->listepresents;
    }

    public function setListepresents(?string $listepresents): self
    {
        $this->listepresents = $listepresents;

        return $this;
    }

    public function getListeabsents(): ?string
    {
        return $this->listeabsents;
    }

    public function setListeabsents(?string $listeabsents): self
    {
        $this->listeabsents = $listeabsents;

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
