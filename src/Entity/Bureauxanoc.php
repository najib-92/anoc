<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bureauxanoc
 *
 * @ORM\Table(name="bureauxanoc", indexes={@ORM\Index(name="fk_relationship_22", columns={"conseilanocid"})})
 * @ORM\Entity
 */
class Bureauxanoc
{
    /**
     * @var int
     *
     * @ORM\Column(name="bureauxanocid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bureauxanocid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateelection", type="date", nullable=true)
     */
    private $dateelection;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="debutmandat", type="date", nullable=true)
     */
    private $debutmandat;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="finmandat", type="date", nullable=true)
     */
    private $finmandat;

    /**
     * @var \Conseilanoc
     *
     * @ORM\ManyToOne(targetEntity="Conseilanoc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conseilanocid", referencedColumnName="conseilanocid")
     * })
     */
    private $conseilanocid;

    public function getBureauxanocid(): ?int
    {
        return $this->bureauxanocid;
    }

    public function getDateelection(): ?\DateTimeInterface
    {
        return $this->dateelection;
    }

    public function setDateelection(?\DateTimeInterface $dateelection): self
    {
        $this->dateelection = $dateelection;

        return $this;
    }

    public function getDebutmandat(): ?\DateTimeInterface
    {
        return $this->debutmandat;
    }

    public function setDebutmandat(?\DateTimeInterface $debutmandat): self
    {
        $this->debutmandat = $debutmandat;

        return $this;
    }

    public function getFinmandat(): ?\DateTimeInterface
    {
        return $this->finmandat;
    }

    public function setFinmandat(?\DateTimeInterface $finmandat): self
    {
        $this->finmandat = $finmandat;

        return $this;
    }

    public function getConseilanocid(): ?Conseilanoc
    {
        return $this->conseilanocid;
    }

    public function setConseilanocid(?Conseilanoc $conseilanocid): self
    {
        $this->conseilanocid = $conseilanocid;

        return $this;
    }


}
