<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delegationpouvoirs
 *
 * @ORM\Table(name="delegationpouvoirs", indexes={@ORM\Index(name="fk_relationship_43", columns={"groupementid"}), @ORM\Index(name="fk_relationship_42", columns={"eleveurid"})})
 * @ORM\Entity
 */
class Delegationpouvoirs
{
    /**
     * @var int
     *
     * @ORM\Column(name="delegationpouvoirid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $delegationpouvoirid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="presidentgroupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $presidentgroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tresoriergroupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $tresoriergroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="referance", type="text", length=65535, nullable=true)
     */
    private $referance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero", type="text", length=65535, nullable=true)
     */
    private $numero;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateedition", type="date", nullable=true)
     */
    private $dateedition;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datedebutdelegation", type="date", nullable=true)
     */
    private $datedebutdelegation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="banque", type="text", length=65535, nullable=true)
     */
    private $banque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="agence", type="text", length=65535, nullable=true)
     */
    private $agence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rib", type="decimal", precision=24, scale=0, nullable=true)
     */
    private $rib;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pouvoirs", type="blob", length=65535, nullable=true)
     */
    private $pouvoirs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observation", type="text", length=65535, nullable=true)
     */
    private $observation;

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

    public function getDelegationpouvoirid(): ?int
    {
        return $this->delegationpouvoirid;
    }

    public function getPresidentgroupementid(): ?string
    {
        return $this->presidentgroupementid;
    }

    public function setPresidentgroupementid(?string $presidentgroupementid): self
    {
        $this->presidentgroupementid = $presidentgroupementid;

        return $this;
    }

    public function getTresoriergroupementid(): ?string
    {
        return $this->tresoriergroupementid;
    }

    public function setTresoriergroupementid(?string $tresoriergroupementid): self
    {
        $this->tresoriergroupementid = $tresoriergroupementid;

        return $this;
    }

    public function getReferance(): ?string
    {
        return $this->referance;
    }

    public function setReferance(?string $referance): self
    {
        $this->referance = $referance;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDateedition(): ?\DateTimeInterface
    {
        return $this->dateedition;
    }

    public function setDateedition(?\DateTimeInterface $dateedition): self
    {
        $this->dateedition = $dateedition;

        return $this;
    }

    public function getDatedebutdelegation(): ?\DateTimeInterface
    {
        return $this->datedebutdelegation;
    }

    public function setDatedebutdelegation(?\DateTimeInterface $datedebutdelegation): self
    {
        $this->datedebutdelegation = $datedebutdelegation;

        return $this;
    }

    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): self
    {
        $this->banque = $banque;

        return $this;
    }

    public function getAgence(): ?string
    {
        return $this->agence;
    }

    public function setAgence(?string $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(?string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getPouvoirs()
    {
        return $this->pouvoirs;
    }

    public function setPouvoirs($pouvoirs): self
    {
        $this->pouvoirs = $pouvoirs;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

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
