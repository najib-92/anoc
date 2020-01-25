<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accesmodules
 *
 * @ORM\Table(name="accesmodules")
 * @ORM\Entity
 */
class Accesmodules
{
    /**
     * @var int
     *
     * @ORM\Column(name="accemoduleid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accemoduleid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="module", type="text", length=65535, nullable=true)
     */
    private $module;

    public function getAccemoduleid(): ?int
    {
        return $this->accemoduleid;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(?string $module): self
    {
        $this->module = $module;

        return $this;
    }


}
