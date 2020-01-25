<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Decisionrbgpt
 *
 * @ORM\Table(name="decisionrbgpt")
 * @ORM\Entity
 */
class Decisionrbgpt
{
    /**
     * @var int
     *
     * @ORM\Column(name="decisionrbgptid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $decisionrbgptid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rbgptid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $rbgptid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lignedecision", type="text", length=65535, nullable=true)
     */
    private $lignedecision;

    public function getDecisionrbgptid(): ?int
    {
        return $this->decisionrbgptid;
    }

    public function getRbgptid(): ?string
    {
        return $this->rbgptid;
    }

    public function setRbgptid(?string $rbgptid): self
    {
        $this->rbgptid = $rbgptid;

        return $this;
    }

    public function getLignedecision(): ?string
    {
        return $this->lignedecision;
    }

    public function setLignedecision(?string $lignedecision): self
    {
        $this->lignedecision = $lignedecision;

        return $this;
    }


}
