<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleveursexclus
 *
 * @ORM\Table(name="eleveursexclus")
 * @ORM\Entity
 */
class Eleveursexclus
{
    /**
     * @var int
     *
     * @ORM\Column(name="eleveurexcluid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eleveurexcluid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateexclusion", type="date", nullable=true)
     */
    private $dateexclusion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motif", type="text", length=65535, nullable=true)
     */
    private $motif;

    public function getEleveurexcluid(): ?int
    {
        return $this->eleveurexcluid;
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

    public function getEleveurid(): ?string
    {
        return $this->eleveurid;
    }

    public function setEleveurid(?string $eleveurid): self
    {
        $this->eleveurid = $eleveurid;

        return $this;
    }

    public function getDateexclusion(): ?\DateTimeInterface
    {
        return $this->dateexclusion;
    }

    public function setDateexclusion(?\DateTimeInterface $dateexclusion): self
    {
        $this->dateexclusion = $dateexclusion;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }


}
