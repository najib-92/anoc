<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indicateursdesconventions
 *
 * @ORM\Table(name="indicateursdesconventions", indexes={@ORM\Index(name="fk_relationship_69", columns={"indicateuruneconventionid"})})
 * @ORM\Entity
 */
class Indicateursdesconventions
{
    /**
     * @var int
     *
     * @ORM\Column(name="indicateurdesconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $indicateurdesconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="indicateur", type="text", length=65535, nullable=true)
     */
    private $indicateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="unite", type="text", length=65535, nullable=true)
     */
    private $unite;

    /**
     * @var \Indicateuruneconvention
     *
     * @ORM\ManyToOne(targetEntity="Indicateuruneconvention")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="indicateuruneconventionid", referencedColumnName="indicateuruneconventionid")
     * })
     */
    private $indicateuruneconventionid;

    public function getIndicateurdesconventionid(): ?int
    {
        return $this->indicateurdesconventionid;
    }

    public function getIndicateur(): ?string
    {
        return $this->indicateur;
    }

    public function setIndicateur(?string $indicateur): self
    {
        $this->indicateur = $indicateur;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(?string $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getIndicateuruneconventionid(): ?Indicateuruneconvention
    {
        return $this->indicateuruneconventionid;
    }

    public function setIndicateuruneconventionid(?Indicateuruneconvention $indicateuruneconventionid): self
    {
        $this->indicateuruneconventionid = $indicateuruneconventionid;

        return $this;
    }


}
