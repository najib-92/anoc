<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Races
 *
 * @ORM\Table(name="races", indexes={@ORM\Index(name="groupementid", columns={"groupementid"}), @ORM\Index(name="secteurid", columns={"secteurid"})})
 * @ORM\Entity
 */
class Races
{
    /**
     * @var int
     *
     * @ORM\Column(name="raceid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $raceid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="racefr", type="string", length=50, nullable=true)
     */
    private $racefr = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="especefr", type="string", length=50, nullable=true)
     */
    private $especefr = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="racear", type="string", length=50, nullable=true)
     */
    private $racear = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="especear", type="string", length=50, nullable=true)
     */
    private $especear = '';

    /**
     * @var \Secteurs
     *
     * @ORM\ManyToOne(targetEntity="Secteurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="secteurid", referencedColumnName="secteurid")
     * })
     */
    private $secteurid;

    /**
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    public function getRaceid(): ?int
    {
        return $this->raceid;
    }

    public function getRacefr(): ?string
    {
        return $this->racefr;
    }

    public function setRacefr(?string $racefr): self
    {
        $this->racefr = $racefr;

        return $this;
    }

    public function getEspecefr(): ?string
    {
        return $this->especefr;
    }

    public function setEspecefr(?string $especefr): self
    {
        $this->especefr = $especefr;

        return $this;
    }

    public function getRacear(): ?string
    {
        return $this->racear;
    }

    public function setRacear(?string $racear): self
    {
        $this->racear = $racear;

        return $this;
    }

    public function getEspecear(): ?string
    {
        return $this->especear;
    }

    public function setEspecear(?string $especear): self
    {
        $this->especear = $especear;

        return $this;
    }

    public function getSecteurid(): ?Secteurs
    {
        return $this->secteurid;
    }

    public function setSecteurid(?Secteurs $secteurid): self
    {
        $this->secteurid = $secteurid;

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
