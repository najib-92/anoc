<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Conseilanoc
 *
 * @ORM\Table(name="conseilanoc", indexes={@ORM\Index(name="fk_relationship_37", columns={"responsabiliteid"}), @ORM\Index(name="fk_relationship_23", columns={"bureauxanocid"})})
 * @ORM\Entity
 */
class Conseilanoc
{
    /**
     * @var int
     *
     * @ORM\Column(name="conseilanocid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $conseilanocid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specimensignature", type="text", length=65535, nullable=true)
     */
    private $specimensignature;

    /**
     * @var \Bureauxanoc
     *
     * @ORM\ManyToOne(targetEntity="Bureauxanoc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bureauxanocid", referencedColumnName="bureauxanocid")
     * })
     */
    private $bureauxanocid;

    /**
     * @var \Responsabilite
     *
     * @ORM\ManyToOne(targetEntity="Responsabilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsabiliteid", referencedColumnName="responsabiliteid")
     * })
     */
    private $responsabiliteid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Eleveurs", inversedBy="conseilanocid")
     * @ORM\JoinTable(name="relationship_35",
     *   joinColumns={
     *     @ORM\JoinColumn(name="conseilanocid", referencedColumnName="conseilanocid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="eleveurid", referencedColumnName="eleveurid")
     *   }
     * )
     */
    private $eleveurid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eleveurid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getConseilanocid(): ?int
    {
        return $this->conseilanocid;
    }

    public function getSpecimensignature(): ?string
    {
        return $this->specimensignature;
    }

    public function setSpecimensignature(?string $specimensignature): self
    {
        $this->specimensignature = $specimensignature;

        return $this;
    }

    public function getBureauxanocid(): ?Bureauxanoc
    {
        return $this->bureauxanocid;
    }

    public function setBureauxanocid(?Bureauxanoc $bureauxanocid): self
    {
        $this->bureauxanocid = $bureauxanocid;

        return $this;
    }

    public function getResponsabiliteid(): ?Responsabilite
    {
        return $this->responsabiliteid;
    }

    public function setResponsabiliteid(?Responsabilite $responsabiliteid): self
    {
        $this->responsabiliteid = $responsabiliteid;

        return $this;
    }

    /**
     * @return Collection|Eleveurs[]
     */
    public function getEleveurid(): Collection
    {
        return $this->eleveurid;
    }

    public function addEleveurid(Eleveurs $eleveurid): self
    {
        if (!$this->eleveurid->contains($eleveurid)) {
            $this->eleveurid[] = $eleveurid;
        }

        return $this;
    }

    public function removeEleveurid(Eleveurs $eleveurid): self
    {
        if ($this->eleveurid->contains($eleveurid)) {
            $this->eleveurid->removeElement($eleveurid);
        }

        return $this;
    }

}
