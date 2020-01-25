<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordrejourrbgpt
 *
 * @ORM\Table(name="ordrejourrbgpt")
 * @ORM\Entity
 */
class Ordrejourrbgpt
{
    /**
     * @var int
     *
     * @ORM\Column(name="ordrejourrbgptid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordrejourrbgptid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rbgptid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $rbgptid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ligneordrejour", type="text", length=65535, nullable=true)
     */
    private $ligneordrejour;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="lignediscutee", type="boolean", nullable=true)
     */
    private $lignediscutee;

    public function getOrdrejourrbgptid(): ?int
    {
        return $this->ordrejourrbgptid;
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

    public function getLigneordrejour(): ?string
    {
        return $this->ligneordrejour;
    }

    public function setLigneordrejour(?string $ligneordrejour): self
    {
        $this->ligneordrejour = $ligneordrejour;

        return $this;
    }

    public function getLignediscutee(): ?bool
    {
        return $this->lignediscutee;
    }

    public function setLignediscutee(?bool $lignediscutee): self
    {
        $this->lignediscutee = $lignediscutee;

        return $this;
    }


}
