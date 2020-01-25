<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presidentsreunionsgroupements
 *
 * @ORM\Table(name="presidentsreunionsgroupements")
 * @ORM\Entity
 */
class Presidentsreunionsgroupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="presidentreuniongroupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $presidentreuniongroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reuniongroupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $reuniongroupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="posteid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $posteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    public function getPresidentreuniongroupementid(): ?int
    {
        return $this->presidentreuniongroupementid;
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

    public function getEleveurid(): ?string
    {
        return $this->eleveurid;
    }

    public function setEleveurid(?string $eleveurid): self
    {
        $this->eleveurid = $eleveurid;

        return $this;
    }

    public function getPosteid(): ?string
    {
        return $this->posteid;
    }

    public function setPosteid(?string $posteid): self
    {
        $this->posteid = $posteid;

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
