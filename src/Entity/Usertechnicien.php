<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usertechnicien
 *
 * @ORM\Table(name="usertechnicien", indexes={@ORM\Index(name="personnelForeignKey", columns={"Technicien"}), @ORM\Index(name="UserForeignKey", columns={"User"})})
 * @ORM\Entity
 */
class Usertechnicien
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="User", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Techniciens
     *
     * @ORM\ManyToOne(targetEntity="Techniciens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Technicien", referencedColumnName="technicienid")
     * })
     */
    private $technicien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTechnicien(): ?Techniciens
    {
        return $this->technicien;
    }

    public function setTechnicien(?Techniciens $technicien): self
    {
        $this->technicien = $technicien;

        return $this;
    }


}
