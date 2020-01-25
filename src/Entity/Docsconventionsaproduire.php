<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docsconventionsaproduire
 *
 * @ORM\Table(name="docsconventionsaproduire")
 * @ORM\Entity
 */
class Docsconventionsaproduire
{
    /**
     * @var int
     *
     * @ORM\Column(name="docconventionaproduireid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $docconventionaproduireid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="document", type="text", length=65535, nullable=true)
     */
    private $document;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var int|null
     *
     * @ORM\Column(name="aproduirdansnjours", type="integer", nullable=true)
     */
    private $aproduirdansnjours;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelimite", type="date", nullable=true)
     */
    private $datelimite;

    public function getDocconventionaproduireid(): ?int
    {
        return $this->docconventionaproduireid;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(?string $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }

    public function getAproduirdansnjours(): ?int
    {
        return $this->aproduirdansnjours;
    }

    public function setAproduirdansnjours(?int $aproduirdansnjours): self
    {
        $this->aproduirdansnjours = $aproduirdansnjours;

        return $this;
    }

    public function getDatelimite(): ?\DateTimeInterface
    {
        return $this->datelimite;
    }

    public function setDatelimite(?\DateTimeInterface $datelimite): self
    {
        $this->datelimite = $datelimite;

        return $this;
    }


}
