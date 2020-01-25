<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Troupeauxdebase
 *
 * @ORM\Table(name="troupeauxdebase", indexes={@ORM\Index(name="fk_relationship_55", columns={"ele_eleveurid"})})
 * @ORM\Entity
 */
class Troupeauxdebase
{
    /**
     * @var int
     *
     * @ORM\Column(name="troupeaudebaseid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $troupeaudebaseid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="espece", type="text", length=65535, nullable=true)
     */
    private $espece;

    /**
     * @var string|null
     *
     * @ORM\Column(name="maledeluttenum", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $maledeluttenum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="effectiffemelle", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $effectiffemelle;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="agentanoc", type="text", length=65535, nullable=true)
     */
    private $agentanoc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var \Eleveurs
     *
     * @ORM\ManyToOne(targetEntity="Eleveurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ele_eleveurid", referencedColumnName="eleveurid")
     * })
     */
    private $eleEleveurid;

    public function getTroupeaudebaseid(): ?int
    {
        return $this->troupeaudebaseid;
    }

    public function getConventionid(): ?string
    {
        return $this->conventionid;
    }

    public function setConventionid(?string $conventionid): self
    {
        $this->conventionid = $conventionid;

        return $this;
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

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(?string $espece): self
    {
        $this->espece = $espece;

        return $this;
    }

    public function getMaledeluttenum(): ?string
    {
        return $this->maledeluttenum;
    }

    public function setMaledeluttenum(?string $maledeluttenum): self
    {
        $this->maledeluttenum = $maledeluttenum;

        return $this;
    }

    public function getEffectiffemelle(): ?string
    {
        return $this->effectiffemelle;
    }

    public function setEffectiffemelle(?string $effectiffemelle): self
    {
        $this->effectiffemelle = $effectiffemelle;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAgentanoc(): ?string
    {
        return $this->agentanoc;
    }

    public function setAgentanoc(?string $agentanoc): self
    {
        $this->agentanoc = $agentanoc;

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

    public function getEleEleveurid(): ?Eleveurs
    {
        return $this->eleEleveurid;
    }

    public function setEleEleveurid(?Eleveurs $eleEleveurid): self
    {
        $this->eleEleveurid = $eleEleveurid;

        return $this;
    }


}
