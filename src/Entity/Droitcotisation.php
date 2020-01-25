<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Droitcotisation
 *
 * @ORM\Table(name="droitcotisation", indexes={@ORM\Index(name="fk_relationship_41", columns={"groupementid"}), @ORM\Index(name="fk_relationship_40", columns={"eleveurid"})})
 * @ORM\Entity
 */
class Droitcotisation
{
    /**
     * @var int
     *
     * @ORM\Column(name="droitcotisationid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $droitcotisationid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="anneecotisation", type="date", nullable=true)
     */
    private $anneecotisation;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantpaye", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantpaye;

    /**
     * @var \Eleveurs
     *
     * @ORM\ManyToOne(targetEntity="Eleveurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="eleveurid", referencedColumnName="eleveurid")
     * })
     */
    private $eleveurid;

    /**
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    public function getDroitcotisationid(): ?int
    {
        return $this->droitcotisationid;
    }

    public function getAnneecotisation(): ?\DateTimeInterface
    {
        return $this->anneecotisation;
    }

    public function setAnneecotisation(?\DateTimeInterface $anneecotisation): self
    {
        $this->anneecotisation = $anneecotisation;

        return $this;
    }

    public function getMontantpaye(): ?float
    {
        return $this->montantpaye;
    }

    public function setMontantpaye(?float $montantpaye): self
    {
        $this->montantpaye = $montantpaye;

        return $this;
    }

    public function getEleveurid(): ?Eleveurs
    {
        return $this->eleveurid;
    }

    public function setEleveurid(?Eleveurs $eleveurid): self
    {
        $this->eleveurid = $eleveurid;

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
