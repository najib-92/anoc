<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bureauxgroupements
 *
 * @ORM\Table(name="bureauxgroupements", indexes={@ORM\Index(name="fk_relationship_27", columns={"groupementid"})})
 * @ORM\Entity
 */
class Bureauxgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="bureaugrptid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bureaugrptid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateelection", type="date", nullable=true)
     */
    private $dateelection;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="debutmandat", type="date", nullable=true)
     */
    private $debutmandat;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="finmandat", type="date", nullable=true)
     */
    private $finmandat;

    /**
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    public function getBureaugrptid(): ?int
    {
        return $this->bureaugrptid;
    }

    public function getDateelection(): ?\DateTimeInterface
    {
        return $this->dateelection;
    }

    public function setDateelection(?\DateTimeInterface $dateelection): self
    {
        $this->dateelection = $dateelection;

        return $this;
    }

    public function getDebutmandat(): ?\DateTimeInterface
    {
        return $this->debutmandat;
    }

    public function setDebutmandat(?\DateTimeInterface $debutmandat): self
    {
        $this->debutmandat = $debutmandat;

        return $this;
    }

    public function getFinmandat(): ?\DateTimeInterface
    {
        return $this->finmandat;
    }

    public function setFinmandat(?\DateTimeInterface $finmandat): self
    {
        $this->finmandat = $finmandat;

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
