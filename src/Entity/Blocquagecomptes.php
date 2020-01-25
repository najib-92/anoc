<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blocquagecomptes
 *
 * @ORM\Table(name="blocquagecomptes")
 * @ORM\Entity
 */
class Blocquagecomptes
{
    /**
     * @var int
     *
     * @ORM\Column(name="blocquagecompteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $blocquagecompteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="utilisateurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $utilisateurid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="comptebloquedu", type="date", nullable=true)
     */
    private $comptebloquedu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="comptebloqueau", type="date", nullable=true)
     */
    private $comptebloqueau;

    /**
     * @var string|null
     *
     * @ORM\Column(name="plocquepar", type="text", length=65535, nullable=true)
     */
    private $plocquepar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motifblocquage", type="text", length=65535, nullable=true)
     */
    private $motifblocquage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getBlocquagecompteid(): ?int
    {
        return $this->blocquagecompteid;
    }

    public function getUtilisateurid(): ?string
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid(?string $utilisateurid): self
    {
        $this->utilisateurid = $utilisateurid;

        return $this;
    }

    public function getComptebloquedu(): ?\DateTimeInterface
    {
        return $this->comptebloquedu;
    }

    public function setComptebloquedu(?\DateTimeInterface $comptebloquedu): self
    {
        $this->comptebloquedu = $comptebloquedu;

        return $this;
    }

    public function getComptebloqueau(): ?\DateTimeInterface
    {
        return $this->comptebloqueau;
    }

    public function setComptebloqueau(?\DateTimeInterface $comptebloqueau): self
    {
        $this->comptebloqueau = $comptebloqueau;

        return $this;
    }

    public function getPlocquepar(): ?string
    {
        return $this->plocquepar;
    }

    public function setPlocquepar(?string $plocquepar): self
    {
        $this->plocquepar = $plocquepar;

        return $this;
    }

    public function getMotifblocquage(): ?string
    {
        return $this->motifblocquage;
    }

    public function setMotifblocquage(?string $motifblocquage): self
    {
        $this->motifblocquage = $motifblocquage;

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
