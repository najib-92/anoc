<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Histoconseilanoc
 *
 * @ORM\Table(name="histoconseilanoc")
 * @ORM\Entity
 */
class Histoconseilanoc
{
    /**
     * @var int
     *
     * @ORM\Column(name="conseilanocid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $conseilanocid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bureauxanocid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $bureauxanocid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="responsabiliteid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $responsabiliteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specimensignature", type="text", length=65535, nullable=true)
     */
    private $specimensignature;

    public function getConseilanocid(): ?int
    {
        return $this->conseilanocid;
    }

    public function getBureauxanocid(): ?string
    {
        return $this->bureauxanocid;
    }

    public function setBureauxanocid(?string $bureauxanocid): self
    {
        $this->bureauxanocid = $bureauxanocid;

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

    public function getResponsabiliteid(): ?string
    {
        return $this->responsabiliteid;
    }

    public function setResponsabiliteid(?string $responsabiliteid): self
    {
        $this->responsabiliteid = $responsabiliteid;

        return $this;
    }

    public function getSpecimensignature(): ?string
    {
        return $this->specimensignature;
    }

    public function setSpecimensignature(?string $specimensignature): self
    {
        $this->specimensignature = $specimensignature;

        return $this;
    }


}
