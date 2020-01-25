<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banques
 *
 * @ORM\Table(name="banques")
 * @ORM\Entity
 */
class Banques
{
    /**
     * @var int
     *
     * @ORM\Column(name="banqueid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $banqueid;

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
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getBanqueid(): ?int
    {
        return $this->banqueid;
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
