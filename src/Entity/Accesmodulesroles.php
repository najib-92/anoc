<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accesmodulesroles
 *
 * @ORM\Table(name="accesmodulesroles")
 * @ORM\Entity
 */
class Accesmodulesroles
{
    /**
     * @var int
     *
     * @ORM\Column(name="accemoduleroleid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accemoduleroleid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="moduleid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $moduleid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roleid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $roleid;

    public function getAccemoduleroleid(): ?int
    {
        return $this->accemoduleroleid;
    }

    public function getModuleid(): ?string
    {
        return $this->moduleid;
    }

    public function setModuleid(?string $moduleid): self
    {
        $this->moduleid = $moduleid;

        return $this;
    }

    public function getRoleid(): ?string
    {
        return $this->roleid;
    }

    public function setRoleid(?string $roleid): self
    {
        $this->roleid = $roleid;

        return $this;
    }


}
