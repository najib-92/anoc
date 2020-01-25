<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reunionbureaugrpt
 *
 * @ORM\Table(name="reunionbureaugrpt", indexes={@ORM\Index(name="fk_relationship_29", columns={"groupementid"})})
 * @ORM\Entity
 */
class Reunionbureaugrpt
{
    /**
     * @var int
     *
     * @ORM\Column(name="reunionbureaugrptid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reunionbureaugrptid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datereunion", type="date", nullable=true)
     */
    private $datereunion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieureunion", type="text", length=65535, nullable=true)
     */
    private $lieureunion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typereunion", type="text", length=65535, nullable=true)
     */
    private $typereunion;

    /**
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    public function getReunionbureaugrptid(): ?int
    {
        return $this->reunionbureaugrptid;
    }

    public function getDatereunion(): ?\DateTimeInterface
    {
        return $this->datereunion;
    }

    public function setDatereunion(?\DateTimeInterface $datereunion): self
    {
        $this->datereunion = $datereunion;

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

    public function getTypereunion(): ?string
    {
        return $this->typereunion;
    }

    public function setTypereunion(?string $typereunion): self
    {
        $this->typereunion = $typereunion;

        return $this;
    }

    public function getGroupementid(): ?Groupements
    {
        return $this->groupementid;
    }

    public function setGroupementid(?Groupements $groupementid): self
    {
        $this->groupementid = $groupementid;

        return $this;
    }


}
