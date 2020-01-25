<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banquesgroupements
 *
 * @ORM\Table(name="banquesgroupements")
 * @ORM\Entity
 */
class Banquesgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="banquegroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $banquegroupementid;

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
     * @var string|null
     *
     * @ORM\Column(name="rib", type="decimal", precision=24, scale=0, nullable=true)
     */
    private $rib;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="text", length=65535, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $fax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fixe1", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $fixe1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fixe2", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $fixe2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gsm1", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $gsm1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gsm2", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $gsm2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getBanquegroupementid(): ?int
    {
        return $this->banquegroupementid;
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

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(?string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getFixe1(): ?string
    {
        return $this->fixe1;
    }

    public function setFixe1(?string $fixe1): self
    {
        $this->fixe1 = $fixe1;

        return $this;
    }

    public function getFixe2(): ?string
    {
        return $this->fixe2;
    }

    public function setFixe2(?string $fixe2): self
    {
        $this->fixe2 = $fixe2;

        return $this;
    }

    public function getGsm1(): ?string
    {
        return $this->gsm1;
    }

    public function setGsm1(?string $gsm1): self
    {
        $this->gsm1 = $gsm1;

        return $this;
    }

    public function getGsm2(): ?string
    {
        return $this->gsm2;
    }

    public function setGsm2(?string $gsm2): self
    {
        $this->gsm2 = $gsm2;

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
