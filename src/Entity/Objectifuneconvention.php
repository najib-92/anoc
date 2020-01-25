<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objectifuneconvention
 *
 * @ORM\Table(name="objectifuneconvention")
 * @ORM\Entity
 */
class Objectifuneconvention
{
    /**
     * @var int
     *
     * @ORM\Column(name="objectifuneconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $objectifuneconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objectifdeconventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $objectifdeconventionid;

    public function getObjectifuneconventionid(): ?int
    {
        return $this->objectifuneconventionid;
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

    public function getObjectifdeconventionid(): ?string
    {
        return $this->objectifdeconventionid;
    }

    public function setObjectifdeconventionid(?string $objectifdeconventionid): self
    {
        $this->objectifdeconventionid = $objectifdeconventionid;

        return $this;
    }


}
