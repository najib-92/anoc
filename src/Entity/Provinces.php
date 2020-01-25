<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provinces
 *
 * @ORM\Table(name="provinces")
 * @ORM\Entity
 */
class Provinces
{
    /**
     * @var int
     *
     * @ORM\Column(name="provinceid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $provinceid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="provincefr", type="text", length=65535, nullable=true)
     */
    private $provincefr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="provincear", type="text", length=65535, nullable=true)
     */
    private $provincear;

    public function getProvinceid(): ?int
    {
        return $this->provinceid;
    }

    public function getProvincefr(): ?string
    {
        return $this->provincefr;
    }

    public function setProvincefr(?string $provincefr): self
    {
        $this->provincefr = $provincefr;

        return $this;
    }

    public function getProvincear(): ?string
    {
        return $this->provincear;
    }

    public function setProvincear(?string $provincear): self
    {
        $this->provincear = $provincear;

        return $this;
    }


}
