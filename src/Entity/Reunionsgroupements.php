<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reunionsgroupements
 *
 * @ORM\Table(name="reunionsgroupements")
 * @ORM\Entity
 */
class Reunionsgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="reuniongroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reuniongroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="detereunion", type="date", nullable=true)
     */
    private $detereunion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieureunion", type="text", length=65535, nullable=true)
     */
    private $lieureunion;

    public function getReuniongroupementid(): ?int
    {
        return $this->reuniongroupementid;
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

    public function getDetereunion(): ?\DateTimeInterface
    {
        return $this->detereunion;
    }

    public function setDetereunion(?\DateTimeInterface $detereunion): self
    {
        $this->detereunion = $detereunion;

        return $this;
    }

    public function getLieureunion(): ?string
    {
        return $this->lieureunion;
    }

    public function setLieureunion(?string $lieureunion): self
    {
        $this->lieureunion = $lieureunion;

        return $this;
    }


}
