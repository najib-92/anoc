<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suivibanquesgroupements
 *
 * @ORM\Table(name="suivibanquesgroupements")
 * @ORM\Entity
 */
class Suivibanquesgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="suivibanquegroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $suivibanquegroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="banqueid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $banqueid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="tadeoperation", type="datetime", nullable=true)
     */
    private $tadeoperation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="operation", type="text", length=65535, nullable=true)
     */
    private $operation;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantversement", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantversement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantretrait", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantretrait;

    /**
     * @var string|null
     *
     * @ORM\Column(name="chequenumero", type="text", length=65535, nullable=true)
     */
    private $chequenumero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getSuivibanquegroupementid(): ?int
    {
        return $this->suivibanquegroupementid;
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

    public function getBanqueid(): ?string
    {
        return $this->banqueid;
    }

    public function setBanqueid(?string $banqueid): self
    {
        $this->banqueid = $banqueid;

        return $this;
    }

    public function getTadeoperation(): ?\DateTimeInterface
    {
        return $this->tadeoperation;
    }

    public function setTadeoperation(?\DateTimeInterface $tadeoperation): self
    {
        $this->tadeoperation = $tadeoperation;

        return $this;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getMontantversement(): ?float
    {
        return $this->montantversement;
    }

    public function setMontantversement(?float $montantversement): self
    {
        $this->montantversement = $montantversement;

        return $this;
    }

    public function getMontantretrait(): ?float
    {
        return $this->montantretrait;
    }

    public function setMontantretrait(?float $montantretrait): self
    {
        $this->montantretrait = $montantretrait;

        return $this;
    }

    public function getChequenumero(): ?string
    {
        return $this->chequenumero;
    }

    public function setChequenumero(?string $chequenumero): self
    {
        $this->chequenumero = $chequenumero;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }


}
