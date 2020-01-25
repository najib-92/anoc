<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recommandationsreunionsgroupements
 *
 * @ORM\Table(name="recommandationsreunionsgroupements")
 * @ORM\Entity
 */
class Recommandationsreunionsgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="recommandationreuniongroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recommandationreuniongroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reuniongroupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $reuniongroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libellerecommandation", type="text", length=65535, nullable=true)
     */
    private $libellerecommandation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getRecommandationreuniongroupementid(): ?int
    {
        return $this->recommandationreuniongroupementid;
    }

    public function getReuniongroupementid(): ?string
    {
        return $this->reuniongroupementid;
    }

    public function setReuniongroupementid(?string $reuniongroupementid): self
    {
        $this->reuniongroupementid = $reuniongroupementid;

        return $this;
    }

    public function getLibellerecommandation(): ?string
    {
        return $this->libellerecommandation;
    }

    public function setLibellerecommandation(?string $libellerecommandation): self
    {
        $this->libellerecommandation = $libellerecommandation;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }


}
