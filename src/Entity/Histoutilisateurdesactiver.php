<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Histoutilisateurdesactiver
 *
 * @ORM\Table(name="histoutilisateurdesactiver")
 * @ORM\Entity
 */
class Histoutilisateurdesactiver
{
    /**
     * @var int
     *
     * @ORM\Column(name="histoutilisateurdesactiverid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $histoutilisateurdesactiverid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="utilisateurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $utilisateurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="administrateurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $administrateurid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datedebutdesactivation", type="date", nullable=true)
     */
    private $datedebutdesactivation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datefindesactivation", type="date", nullable=true)
     */
    private $datefindesactivation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motif", type="text", length=65535, nullable=true)
     */
    private $motif;

    public function getHistoutilisateurdesactiverid(): ?int
    {
        return $this->histoutilisateurdesactiverid;
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

    public function getAdministrateurid(): ?string
    {
        return $this->administrateurid;
    }

    public function setAdministrateurid(?string $administrateurid): self
    {
        $this->administrateurid = $administrateurid;

        return $this;
    }

    public function getDatedebutdesactivation(): ?\DateTimeInterface
    {
        return $this->datedebutdesactivation;
    }

    public function setDatedebutdesactivation(?\DateTimeInterface $datedebutdesactivation): self
    {
        $this->datedebutdesactivation = $datedebutdesactivation;

        return $this;
    }

    public function getDatefindesactivation(): ?\DateTimeInterface
    {
        return $this->datefindesactivation;
    }

    public function setDatefindesactivation(?\DateTimeInterface $datefindesactivation): self
    {
        $this->datefindesactivation = $datefindesactivation;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }


}
