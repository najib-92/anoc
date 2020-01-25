<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectationtechnicien
 *
 * @ORM\Table(name="affectationtechnicien", indexes={@ORM\Index(name="technicienid", columns={"technicienid"}), @ORM\Index(name="groupementid", columns={"groupementid"})})
 * @ORM\Entity
 */
class Affectationtechnicien
{
    /**
     * @var int
     *
     * @ORM\Column(name="affectationtechnicienid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $affectationtechnicienid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieuaffectationid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $lieuaffectationid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roleid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $roleid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="serviceid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $serviceid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datedebutaffectation", type="date", nullable=true)
     */
    private $datedebutaffectation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datefinaffectation", type="date", nullable=true)
     */
    private $datefinaffectation;

    /**
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    /**
     * @var \Techniciens
     *
     * @ORM\ManyToOne(targetEntity="Techniciens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="technicienid", referencedColumnName="technicienid")
     * })
     */
    private $technicienid;

    public function getAffectationtechnicienid(): ?int
    {
        return $this->affectationtechnicienid;
    }

    public function getLieuaffectationid(): ?string
    {
        return $this->lieuaffectationid;
    }

    public function setLieuaffectationid(?string $lieuaffectationid): self
    {
        $this->lieuaffectationid = $lieuaffectationid;

        return $this;
    }

    public function getRoleid(): ?string
    {
        return $this->roleid;
    }

    public function setRoleid(?string $roleid): self
    {
        $this->roleid = $roleid;

        return $this;
    }

    public function getServiceid(): ?string
    {
        return $this->serviceid;
    }

    public function setServiceid(?string $serviceid): self
    {
        $this->serviceid = $serviceid;

        return $this;
    }

    public function getDatedebutaffectation(): ?\DateTimeInterface
    {
        return $this->datedebutaffectation;
    }

    public function setDatedebutaffectation(?\DateTimeInterface $datedebutaffectation): self
    {
        $this->datedebutaffectation = $datedebutaffectation;

        return $this;
    }

    public function getDatefinaffectation(): ?\DateTimeInterface
    {
        return $this->datefinaffectation;
    }

    public function setDatefinaffectation(?\DateTimeInterface $datefinaffectation): self
    {
        $this->datefinaffectation = $datefinaffectation;

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
