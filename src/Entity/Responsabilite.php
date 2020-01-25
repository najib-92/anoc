<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Responsabilite
 *
 * @ORM\Table(name="responsabilite")
 * @ORM\Entity
 */
class Responsabilite
{
    /**
     * @var int
     *
     * @ORM\Column(name="responsabiliteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $responsabiliteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="responsabilite", type="text", length=65535, nullable=true)
     */
    private $responsabilite;

    public function getResponsabiliteid(): ?int
    {
        return $this->responsabiliteid;
    }

    public function getResponsabilite(): ?string
    {
        return $this->responsabilite;
    }

    public function setResponsabilite(?string $responsabilite): self
    {
        $this->responsabilite = $responsabilite;

        return $this;
    }


}
