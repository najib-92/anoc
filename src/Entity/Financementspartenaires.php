<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Financementspartenaires
 *
 * @ORM\Table(name="financementspartenaires")
 * @ORM\Entity
 */
class Financementspartenaires
{
    /**
     * @var int
     *
     * @ORM\Column(name="financementspartenaires", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $financementspartenaires;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="partenaireid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $partenaireid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="activiteconventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $activiteconventionid;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montantcontribution", type="float", precision=10, scale=0, nullable=true)
     */
    private $montantcontribution;

    public function getFinancementspartenaires(): ?int
    {
        return $this->financementspartenaires;
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

    public function getPartenaireid(): ?string
    {
        return $this->partenaireid;
    }

    public function setPartenaireid(?string $partenaireid): self
    {
        $this->partenaireid = $partenaireid;

        return $this;
    }

    public function getActiviteconventionid(): ?string
    {
        return $this->activiteconventionid;
    }

    public function setActiviteconventionid(?string $activiteconventionid): self
    {
        $this->activiteconventionid = $activiteconventionid;

        return $this;
    }

    public function getMontantcontribution(): ?float
    {
        return $this->montantcontribution;
    }

    public function setMontantcontribution(?float $montantcontribution): self
    {
        $this->montantcontribution = $montantcontribution;

        return $this;
    }


}
