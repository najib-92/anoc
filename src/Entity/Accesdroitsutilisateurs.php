<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accesdroitsutilisateurs
 *
 * @ORM\Table(name="accesdroitsutilisateurs")
 * @ORM\Entity
 */
class Accesdroitsutilisateurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="accedroitutilisateurid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accedroitutilisateurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="utilisateurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $utilisateurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="accemodulesrole", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $accemodulesrole;

    public function getAccedroitutilisateurid(): ?int
    {
        return $this->accedroitutilisateurid;
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

    public function getAccemodulesrole(): ?string
    {
        return $this->accemodulesrole;
    }

    public function setAccemodulesrole(?string $accemodulesrole): self
    {
        $this->accemodulesrole = $accemodulesrole;

        return $this;
    }


}
