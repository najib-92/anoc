<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Villes
 *
 * @ORM\Table(name="villes", indexes={@ORM\Index(name="fk_relationship_51", columns={"provinceid"}), @ORM\Index(name="fk_relation", columns={"secteurid"})})
 * @ORM\Entity
 */
class Villes
{
    /**
     * @var int
     *
     * @ORM\Column(name="villeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $villeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="villefr", type="text", length=65535, nullable=true)
     */
    private $villefr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="villear", type="text", length=65535, nullable=true)
     */
    private $villear;

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
     * @var \Provinces
     *
     * @ORM\ManyToOne(targetEntity="Provinces")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceid", referencedColumnName="provinceid")
     * })
     */
    private $provinceid;

    public function getVilleid(): ?int
    {
        return $this->villeid;
    }

    public function getVillefr(): ?string
    {
        return $this->villefr;
    }

    public function setVillefr(?string $villefr): self
    {
        $this->villefr = strtoupper($villefr);

        return $this;
    }

    public function getVillear(): ?string
    {
        return $this->villear;
    }

    public function setVillear(?string $villear): self
    {
        $this->villear = $villear;

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

    public function getProvinceid(): ?Provinces
    {
        return $this->provinceid;
    }

    public function setProvinceid(?Provinces $provinceid): self
    {
        $this->provinceid = $provinceid;

        return $this;
    }


}
