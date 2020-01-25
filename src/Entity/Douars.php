<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Douars
 *
 * @ORM\Table(name="douars", indexes={@ORM\Index(name="fk_relationship_52", columns={"provinceid"}), @ORM\Index(name="fk_relationship_45", columns={"secteurid"})})
 * @ORM\Entity
 */
class Douars
{
    /**
     * @var int
     *
     * @ORM\Column(name="douarid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $douarid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="douarfr", type="text", length=65535, nullable=true)
     */
    private $douarfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="douarar", type="text", length=65535, nullable=true)
     */
    private $douarar;

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

    public function getDouarid(): ?int
    {
        return $this->douarid;
    }

    public function getDouarfr(): ?string
    {
        return $this->douarfr;
    }

    public function setDouarfr(?string $douarfr): self
    {
        $this->douarfr = $douarfr;

        return $this;
    }

    public function getDouarar(): ?string
    {
        return $this->douarar;
    }

    public function setDouarar(?string $douarar): self
    {
        $this->douarar = $douarar;

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
