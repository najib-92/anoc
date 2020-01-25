<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Conseilgroupement
 *
 * @ORM\Table(name="conseilgroupement", indexes={@ORM\Index(name="fk_relationship_39", columns={"gro_groupementid"}), @ORM\Index(name="fk_relationship_26", columns={"responsabiliteid"})})
 * @ORM\Entity
 */
class Conseilgroupement
{
    /**
     * @var int
     *
     * @ORM\Column(name="conseilgroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $conseilgroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bureaugrptid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $bureaugrptid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specimensignature", type="text", length=65535, nullable=true)
     */
    private $specimensignature;

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
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gro_groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groGroupementid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Eleveurs", inversedBy="conseilgroupementid")
     * @ORM\JoinTable(name="relationship_24",
     *   joinColumns={
     *     @ORM\JoinColumn(name="conseilgroupementid", referencedColumnName="conseilgroupementid")
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

    public function getConseilgroupementid(): ?int
    {
        return $this->conseilgroupementid;
    }

    public function getBureaugrptid(): ?string
    {
        return $this->bureaugrptid;
    }

    public function setBureaugrptid(?string $bureaugrptid): self
    {
        $this->bureaugrptid = $bureaugrptid;

        return $this;
    }

    public function getGroupementid(): ?string
    {
        return $this->groupementid;
    }

    public function setGroupementid(?string $groupementid): self
    {
        $this->groupementid = $groupementid;

        return $this;
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

    public function getResponsabiliteid(): ?Responsabilite
    {
        return $this->responsabiliteid;
    }

    public function setResponsabiliteid(?Responsabilite $responsabiliteid): self
    {
        $this->responsabiliteid = $responsabiliteid;

        return $this;
    }

    public function getGroGroupementid(): ?Groupements
    {
        return $this->groGroupementid;
    }

    public function setGroGroupementid(?Groupements $groGroupementid): self
    {
        $this->groGroupementid = $groGroupementid;

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
