<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Techniciens
 *
 * @ORM\Table(name="techniciens", indexes={@ORM\Index(name="fk_technicien_personnel", columns={"personnelid"})})
 * @ORM\Entity
 */
class Techniciens
{
    /**
     * @var int
     *
     * @ORM\Column(name="technicienid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $technicienid;

    /**
     * @var \Personnel
     *
     * @ORM\ManyToOne(targetEntity="Personnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personnelid", referencedColumnName="personnelid")
     * })
     */
    private $personnelid;

    public function getTechnicienid(): ?int
    {
        return $this->technicienid;
    }

    public function getPersonnelid(): ?Personnel
    {
        return $this->personnelid;
    }

    public function setPersonnelid(?Personnel $personnelid): self
    {
        $this->personnelid = $personnelid;

        return $this;
    }
    public function getNumcinNomfrPrenomfrTechnicien(): ?string
    {
        return $this->getPersonnelid()->getNumcinNomfrPrenomfr();

    }


}
