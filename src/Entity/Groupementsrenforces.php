<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupementsrenforces
 *
 * @ORM\Table(name="groupementsrenforces")
 * @ORM\Entity
 */
class Groupementsrenforces
{
    /**
     * @var int
     *
     * @ORM\Column(name="groupementrenforceid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupementrenforceid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="projetid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $projetid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementsid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementsid;

    public function getGroupementrenforceid(): ?int
    {
        return $this->groupementrenforceid;
    }

    public function getProjetid(): ?string
    {
        return $this->projetid;
    }

    public function setProjetid(?string $projetid): self
    {
        $this->projetid = $projetid;

        return $this;
    }

    public function getGroupementsid(): ?string
    {
        return $this->groupementsid;
    }

    public function setGroupementsid(?string $groupementsid): self
    {
        $this->groupementsid = $groupementsid;

        return $this;
    }


}
