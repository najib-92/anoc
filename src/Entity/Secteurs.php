<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Secteurs
 *
 * @ORM\Table(name="secteurs")
 * @ORM\Entity
 */
class Secteurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="secteurid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $secteurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secteurfr", type="text", length=65535, nullable=true)
     */
    private $secteurfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secteurar", type="text", length=65535, nullable=true)
     */
    private $secteurar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codesecteur", type="text", length=65535, nullable=true)
     */
    private $codesecteur;

    public function getSecteurid(): ?int
    {
        return $this->secteurid;
    }

    public function getSecteurfr(): ?string
    {
        return $this->secteurfr;
    }

    public function setSecteurfr(?string $secteurfr): self
    {
        $this->secteurfr = ucfirst(strtolower($secteurfr));

        return $this;
    }

    public function getSecteurar(): ?string
    {
        return $this->secteurar;
    }

    public function setSecteurar(?string $secteurar): self
    {
        $this->secteurar = $secteurar;

        return $this;
    }

    public function getCodesecteur(): ?string
    {
        return $this->codesecteur;
    }

    public function setCodesecteur(?string $codesecteur): self
    {
        $this->codesecteur = strtoupper($codesecteur);

        return $this;
    }


}
