<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indemnitetechniciens
 *
 * @ORM\Table(name="indemnitetechniciens", indexes={@ORM\Index(name="fk_relationship_56", columns={"technicienid"})})
 * @ORM\Entity
 */
class Indemnitetechniciens
{
    /**
     * @var int
     *
     * @ORM\Column(name="indemnitetechnicienid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $indemnitetechnicienid;

    /**
     * @var float|null
     *
     * @ORM\Column(name="sommerecu", type="float", precision=10, scale=0, nullable=true)
     */
    private $sommerecu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="moistournnee", type="text", length=65535, nullable=true)
     */
    private $moistournnee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="chequenumero", type="text", length=65535, nullable=true)
     */
    private $chequenumero;

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

    /**
     * @var \Techniciens
     *
     * @ORM\ManyToOne(targetEntity="Techniciens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="technicienid", referencedColumnName="technicienid")
     * })
     */
    private $technicienid;

    public function getIndemnitetechnicienid(): ?int
    {
        return $this->indemnitetechnicienid;
    }

    public function getSommerecu(): ?float
    {
        return $this->sommerecu;
    }

    public function setSommerecu(?float $sommerecu): self
    {
        $this->sommerecu = $sommerecu;

        return $this;
    }

    public function getMoistournnee(): ?string
    {
        return $this->moistournnee;
    }

    public function setMoistournnee(?string $moistournnee): self
    {
        $this->moistournnee = $moistournnee;

        return $this;
    }

    public function getChequenumero(): ?string
    {
        return $this->chequenumero;
    }

    public function setChequenumero(?string $chequenumero): self
    {
        $this->chequenumero = $chequenumero;

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
