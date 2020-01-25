<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Histoconseilgroupement
 *
 * @ORM\Table(name="histoconseilgroupement")
 * @ORM\Entity
 */
class Histoconseilgroupement
{
    /**
     * @var int
     *
     * @ORM\Column(name="conseilgroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $conseilgroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bureaugrptid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $bureaugrptid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="responsabiliteid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $responsabiliteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specimensignature", type="text", length=65535, nullable=true)
     */
    private $specimensignature;

    public function getConseilgroupementid(): ?int
    {
        return $this->conseilgroupementid;
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

    public function getBureaugrptid(): ?string
    {
        return $this->bureaugrptid;
    }

    public function setBureaugrptid(?string $bureaugrptid): self
    {
        $this->bureaugrptid = $bureaugrptid;

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

    public function getGroupementid(): ?string
    {
        return $this->groupementid;
    }

    public function setGroupementid(?string $groupementid): self
    {
        $this->groupementid = $groupementid;

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
