<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Superviseurs
 *
 * @ORM\Table(name="superviseurs", indexes={@ORM\Index(name="fk_relationship_50", columns={"personnelid"})})
 * @ORM\Entity
 */
class Superviseurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="histosuperviseurid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $histosuperviseurid;

    /**
     * @var \Personnel
     *
     * @ORM\ManyToOne(targetEntity="Personnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personnelid", referencedColumnName="personnelid")
     * })
     */
    private $personnelid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Eleveurs", inversedBy="histosuperviseurid")
     * @ORM\JoinTable(name="relationship_57",
     *   joinColumns={
     *     @ORM\JoinColumn(name="histosuperviseurid", referencedColumnName="histosuperviseurid")
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

    public function getHistosuperviseurid(): ?int
    {
        return $this->histosuperviseurid;
    }

    public function getPersonnelid(): ?Personnel
    {
        return $this->personnelid;
    }

    public function setPersonnelid(?Personnel $personnelid): self
    {
        $this->personnelid = $personnelid;

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
