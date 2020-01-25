<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mvtbanquegroupements
 *
 * @ORM\Table(name="mvtbanquegroupements", indexes={@ORM\Index(name="fk_relationship_78", columns={"groupementid"})})
 * @ORM\Entity
 */
class Mvtbanquegroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="mvtbanquegroupementsid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mvtbanquegroupementsid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelleoperation", type="text", length=65535, nullable=true)
     */
    private $libelleoperation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="montantrecette", type="string", length=255, nullable=true)
     */
    private $montantrecette;

    /**
     * @var string|null
     *
     * @ORM\Column(name="montantdepence", type="string", length=255, nullable=true)
     */
    private $montantdepence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="operationfaitepar", type="text", length=65535, nullable=true)
     */
    private $operationfaitepar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="piecejustificative", type="text", length=65535, nullable=true)
     */
    private $piecejustificative;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numerocheque", type="integer", nullable=true)
     */
    private $numerocheque;

    /**
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    public function getMvtbanquegroupementsid(): ?int
    {
        return $this->mvtbanquegroupementsid;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLibelleoperation(): ?string
    {
        return $this->libelleoperation;
    }

    public function setLibelleoperation(?string $libelleoperation): self
    {
        $this->libelleoperation = $libelleoperation;

        return $this;
    }

    public function getMontantrecette(): ?string
    {
        return $this->montantrecette;
    }

    public function setMontantrecette(?string $montantrecette): self
    {
        $this->montantrecette = $montantrecette;

        return $this;
    }

    public function getMontantdepence(): ?string
    {
        return $this->montantdepence;
    }

    public function setMontantdepence(?string $montantdepence): self
    {
        $this->montantdepence = $montantdepence;

        return $this;
    }

    public function getOperationfaitepar(): ?string
    {
        return $this->operationfaitepar;
    }

    public function setOperationfaitepar(?string $operationfaitepar): self
    {
        $this->operationfaitepar = $operationfaitepar;

        return $this;
    }

    public function getPiecejustificative(): ?string
    {
        return $this->piecejustificative;
    }

    public function setPiecejustificative(?string $piecejustificative): self
    {
        $this->piecejustificative = $piecejustificative;

        return $this;
    }

    public function getNumerocheque(): ?int
    {
        return $this->numerocheque;
    }

    public function setNumerocheque(?int $numerocheque): self
    {
        $this->numerocheque = $numerocheque;

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
