<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profils
 *
 * @ORM\Table(name="profils")
 * @ORM\Entity
 */
class Profils
{
    /**
     * @var int
     *
     * @ORM\Column(name="profilid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $profilid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelleprofil", type="text", length=65535, nullable=true)
     */
    private $libelleprofil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pageaccueil", type="text", length=65535, nullable=true)
     */
    private $pageaccueil;

    public function getProfilid(): ?int
    {
        return $this->profilid;
    }

    public function getLibelleprofil(): ?string
    {
        return $this->libelleprofil;
    }

    public function setLibelleprofil(?string $libelleprofil): self
    {
        $this->libelleprofil = $libelleprofil;

        return $this;
    }

    public function getPageaccueil(): ?string
    {
        return $this->pageaccueil;
    }

    public function setPageaccueil(?string $pageaccueil): self
    {
        $this->pageaccueil = $pageaccueil;

        return $this;
    }


}
