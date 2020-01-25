<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectationpersonnel
 *
 * @ORM\Table(name="affectationpersonnel")
 * @ORM\Entity
 */
class Affectationpersonnel
{
    /**
     * @var int
     *
     * @ORM\Column(name="affectationpersonnelid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $affectationpersonnelid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personnelid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $personnelid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieuaffectationid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $lieuaffectationid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="posteid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $posteid;

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

    public function getAffectationpersonnelid(): ?int
    {
        return $this->affectationpersonnelid;
    }

    public function getPersonnelid(): ?string
    {
        return $this->personnelid;
    }

    public function setPersonnelid(?string $personnelid): self
    {
        $this->personnelid = $personnelid;

        return $this;
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

    public function getPosteid(): ?string
    {
        return $this->posteid;
    }

    public function setPosteid(?string $posteid): self
    {
        $this->posteid = $posteid;

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


}
