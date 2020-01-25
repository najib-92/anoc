<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alimentationscheptel
 *
 * @ORM\Table(name="alimentationscheptel", indexes={@ORM\Index(name="fk_relationship_70", columns={"con_conventionid"})})
 * @ORM\Entity
 */
class Alimentationscheptel
{
    /**
     * @var int
     *
     * @ORM\Column(name="alimentationcheptelid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $alimentationcheptelid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurprospecteid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurprospecteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alimentationcheptel", type="text", length=65535, nullable=true)
     */
    private $alimentationcheptel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var \Conventions
     *
     * @ORM\ManyToOne(targetEntity="Conventions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="con_conventionid", referencedColumnName="conventionid")
     * })
     */
    private $conConventionid;

    public function getAlimentationcheptelid(): ?int
    {
        return $this->alimentationcheptelid;
    }

    public function getConventionid(): ?string
    {
        return $this->conventionid;
    }

    public function setConventionid(?string $conventionid): self
    {
        $this->conventionid = $conventionid;

        return $this;
    }

    public function getEleveurprospecteid(): ?string
    {
        return $this->eleveurprospecteid;
    }

    public function setEleveurprospecteid(?string $eleveurprospecteid): self
    {
        $this->eleveurprospecteid = $eleveurprospecteid;

        return $this;
    }

    public function getAlimentationcheptel(): ?string
    {
        return $this->alimentationcheptel;
    }

    public function setAlimentationcheptel(?string $alimentationcheptel): self
    {
        $this->alimentationcheptel = $alimentationcheptel;

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

    public function getConConventionid(): ?Conventions
    {
        return $this->conConventionid;
    }

    public function setConConventionid(?Conventions $conConventionid): self
    {
        $this->conConventionid = $conConventionid;

        return $this;
    }


}
