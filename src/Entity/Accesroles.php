<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accesroles
 *
 * @ORM\Table(name="accesroles")
 * @ORM\Entity
 */
class Accesroles
{
    /**
     * @var int
     *
     * @ORM\Column(name="acceroleid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $acceroleid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="role", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $role;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    public function getAcceroleid(): ?int
    {
        return $this->acceroleid;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
