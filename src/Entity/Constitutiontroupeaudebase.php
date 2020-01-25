<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Constitutiontroupeaudebase
 *
 * @ORM\Table(name="constitutiontroupeaudebase")
 * @ORM\Entity
 */
class Constitutiontroupeaudebase
{
    /**
     * @var int
     *
     * @ORM\Column(name="constitutiontroupeaudebaseid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $constitutiontroupeaudebaseid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="troupeaudebaseid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $troupeaudebaseid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numerooreillefemelle", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $numerooreillefemelle;

    public function getConstitutiontroupeaudebaseid(): ?int
    {
        return $this->constitutiontroupeaudebaseid;
    }

    public function getTroupeaudebaseid(): ?string
    {
        return $this->troupeaudebaseid;
    }

    public function setTroupeaudebaseid(?string $troupeaudebaseid): self
    {
        $this->troupeaudebaseid = $troupeaudebaseid;

        return $this;
    }

    public function getNumerooreillefemelle(): ?string
    {
        return $this->numerooreillefemelle;
    }

    public function setNumerooreillefemelle(?string $numerooreillefemelle): self
    {
        $this->numerooreillefemelle = $numerooreillefemelle;

        return $this;
    }


}
