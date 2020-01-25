<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurs
 *
 * @ORM\Table(name="utilisateurs")
 * @ORM\Entity
 */
class Utilisateurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="utilisateurid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $utilisateurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profilid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $profilid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="login", type="text", length=65535, nullable=true)
     */
    private $login;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mdp", type="text", length=65535, nullable=true)
     */
    private $mdp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adressemacpc", type="text", length=65535, nullable=true)
     */
    private $adressemacpc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adressemacportable", type="text", length=65535, nullable=true)
     */
    private $adressemacportable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adressemacgsm", type="text", length=65535, nullable=true)
     */
    private $adressemacgsm;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="compteactif", type="boolean", nullable=true)
     */
    private $compteactif;

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
     * @ORM\Column(name="motifblocquage", type="text", length=65535, nullable=true)
     */
    private $motifblocquage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="blocquepar", type="text", length=65535, nullable=true)
     */
    private $blocquepar;

    public function getUtilisateurid(): ?int
    {
        return $this->utilisateurid;
    }

    public function getProfilid(): ?string
    {
        return $this->profilid;
    }

    public function setProfilid(?string $profilid): self
    {
        $this->profilid = $profilid;

        return $this;
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

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getAdressemacpc(): ?string
    {
        return $this->adressemacpc;
    }

    public function setAdressemacpc(?string $adressemacpc): self
    {
        $this->adressemacpc = $adressemacpc;

        return $this;
    }

    public function getAdressemacportable(): ?string
    {
        return $this->adressemacportable;
    }

    public function setAdressemacportable(?string $adressemacportable): self
    {
        $this->adressemacportable = $adressemacportable;

        return $this;
    }

    public function getAdressemacgsm(): ?string
    {
        return $this->adressemacgsm;
    }

    public function setAdressemacgsm(?string $adressemacgsm): self
    {
        $this->adressemacgsm = $adressemacgsm;

        return $this;
    }

    public function getCompteactif(): ?bool
    {
        return $this->compteactif;
    }

    public function setCompteactif(?bool $compteactif): self
    {
        $this->compteactif = $compteactif;

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

    public function getMotifblocquage(): ?string
    {
        return $this->motifblocquage;
    }

    public function setMotifblocquage(?string $motifblocquage): self
    {
        $this->motifblocquage = $motifblocquage;

        return $this;
    }

    public function getBlocquepar(): ?string
    {
        return $this->blocquepar;
    }

    public function setBlocquepar(?string $blocquepar): self
    {
        $this->blocquepar = $blocquepar;

        return $this;
    }


}
