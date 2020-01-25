<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Engagementsdesconventions
 *
 * @ORM\Table(name="engagementsdesconventions")
 * @ORM\Entity
 */
class Engagementsdesconventions
{
    /**
     * @var int
     *
     * @ORM\Column(name="engagementdeconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $engagementdeconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="engagement", type="text", length=65535, nullable=true)
     */
    private $engagement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getEngagementdeconventionid(): ?int
    {
        return $this->engagementdeconventionid;
    }

    public function getEngagement(): ?string
    {
        return $this->engagement;
    }

    public function setEngagement(?string $engagement): self
    {
        $this->engagement = $engagement;

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
