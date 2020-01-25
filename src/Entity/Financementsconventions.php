<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Financementsconventions
 *
 * @ORM\Table(name="financementsconventions", indexes={@ORM\Index(name="fk_relationship_68", columns={"con_conventionid"})})
 * @ORM\Entity
 */
class Financementsconventions
{
    /**
     * @var int
     *
     * @ORM\Column(name="financementconventionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $financementconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="activiteconventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $activiteconventionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="unite", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $unite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="quantite", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $quantite;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prixunitaire", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixunitaire;

    /**
     * @var float|null
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var \Conventions
     *
     * @ORM\ManyToOne(targetEntity="Conventions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="con_conventionid", referencedColumnName="conventionid")
     * })
     */
    private $conConventionid;

    public function getFinancementconventionid(): ?int
    {
        return $this->financementconventionid;
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

    public function getActiviteconventionid(): ?string
    {
        return $this->activiteconventionid;
    }

    public function setActiviteconventionid(?string $activiteconventionid): self
    {
        $this->activiteconventionid = $activiteconventionid;

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

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(?string $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixunitaire(): ?float
    {
        return $this->prixunitaire;
    }

    public function setPrixunitaire(?float $prixunitaire): self
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getConConventionid(): ?Conventions
    {
        return $this->conConventionid;
    }

    public function setConConventionid(?Conventions $conConventionid): self
    {
        $this->conConventionid = $conConventionid;

        return $this;
    }


}
