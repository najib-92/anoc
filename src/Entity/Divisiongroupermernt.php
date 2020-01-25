<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Divisiongroupermernt
 *
 * @ORM\Table(name="divisiongroupermernt")
 * @ORM\Entity
 */
class Divisiongroupermernt
{
    /**
     * @var int
     *
     * @ORM\Column(name="divisiongroupermerntid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $divisiongroupermerntid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementmereid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementmereid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nouveaugroupementid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $nouveaugroupementid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datedivision", type="date", nullable=true)
     */
    private $datedivision;

    public function getDivisiongroupermerntid(): ?int
    {
        return $this->divisiongroupermerntid;
    }

    public function getGroupementmereid(): ?string
    {
        return $this->groupementmereid;
    }

    public function setGroupementmereid(?string $groupementmereid): self
    {
        $this->groupementmereid = $groupementmereid;

        return $this;
    }

    public function getNouveaugroupementid(): ?string
    {
        return $this->nouveaugroupementid;
    }

    public function setNouveaugroupementid(?string $nouveaugroupementid): self
    {
        $this->nouveaugroupementid = $nouveaugroupementid;

        return $this;
    }

    public function getDatedivision(): ?\DateTimeInterface
    {
        return $this->datedivision;
    }

    public function setDatedivision(?\DateTimeInterface $datedivision): self
    {
        $this->datedivision = $datedivision;

        return $this;
    }


}
