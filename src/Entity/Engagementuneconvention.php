<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Engagementuneconvention
 *
 * @ORM\Table(name="engagementuneconvention")
 * @ORM\Entity
 */
class Engagementuneconvention
{
    /**
     * @var int
     *
     * @ORM\Column(name="engagementuneconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $engagementuneconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="engagementdeconventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $engagementdeconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="partenaireid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $partenaireid;

    public function getEngagementuneconventionid(): ?int
    {
        return $this->engagementuneconventionid;
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

    public function getEngagementdeconventionid(): ?string
    {
        return $this->engagementdeconventionid;
    }

    public function setEngagementdeconventionid(?string $engagementdeconventionid): self
    {
        $this->engagementdeconventionid = $engagementdeconventionid;

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


}
