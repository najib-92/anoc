<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presidentsrbgpt
 *
 * @ORM\Table(name="presidentsrbgpt")
 * @ORM\Entity
 */
class Presidentsrbgpt
{
    /**
     * @var int
     *
     * @ORM\Column(name="presidentrbgptid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $presidentrbgptid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rbgptid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $rbgptid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurid;

    public function getPresidentrbgptid(): ?int
    {
        return $this->presidentrbgptid;
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

    public function getEleveurid(): ?string
    {
        return $this->eleveurid;
    }

    public function setEleveurid(?string $eleveurid): self
    {
        $this->eleveurid = $eleveurid;

        return $this;
    }


}
