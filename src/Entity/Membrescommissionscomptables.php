<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membrescommissionscomptables
 *
 * @ORM\Table(name="membrescommissionscomptables")
 * @ORM\Entity
 */
class Membrescommissionscomptables
{
    /**
     * @var int
     *
     * @ORM\Column(name="membrecommissioncomptableid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $membrecommissioncomptableid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomfr", type="text", length=65535, nullable=true)
     */
    private $nomfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomar", type="text", length=65535, nullable=true)
     */
    private $nomar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomfr", type="text", length=65535, nullable=true)
     */
    private $prenomfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomar", type="text", length=65535, nullable=true)
     */
    private $prenomar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="organisme", type="text", length=65535, nullable=true)
     */
    private $organisme;

    public function getMembrecommissioncomptableid(): ?int
    {
        return $this->membrecommissioncomptableid;
    }

    public function getNomfr(): ?string
    {
        return $this->nomfr;
    }

    public function setNomfr(?string $nomfr): self
    {
        $this->nomfr = $nomfr;

        return $this;
    }

    public function getNomar(): ?string
    {
        return $this->nomar;
    }

    public function setNomar(?string $nomar): self
    {
        $this->nomar = $nomar;

        return $this;
    }

    public function getPrenomfr(): ?string
    {
        return $this->prenomfr;
    }

    public function setPrenomfr(?string $prenomfr): self
    {
        $this->prenomfr = $prenomfr;

        return $this;
    }

    public function getPrenomar(): ?string
    {
        return $this->prenomar;
    }

    public function setPrenomar(?string $prenomar): self
    {
        $this->prenomar = $prenomar;

        return $this;
    }

    public function getOrganisme(): ?string
    {
        return $this->organisme;
    }

    public function setOrganisme(?string $organisme): self
    {
        $this->organisme = $organisme;

        return $this;
    }


}
