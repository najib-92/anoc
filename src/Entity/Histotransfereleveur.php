<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Histotransfereleveur
 *
 * @ORM\Table(name="histotransfereleveur")
 * @ORM\Entity
 */
class Histotransfereleveur
{
    /**
     * @var int
     *
     * @ORM\Column(name="histotransfereleveurid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $histotransfereleveurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eleveurid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $eleveurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid1", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codeeleveur1", type="text", length=65535, nullable=true)
     */
    private $codeeleveur1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementid2", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementid2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codeeleveur2", type="text", length=65535, nullable=true)
     */
    private $codeeleveur2;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datetransfer", type="date", nullable=true)
     */
    private $datetransfer;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="signatureeleveur", type="boolean", nullable=true)
     */
    private $signatureeleveur;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="signaturepresident1", type="boolean", nullable=true)
     */
    private $signaturepresident1;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="signaturetresorier1", type="boolean", nullable=true)
     */
    private $signaturetresorier1;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="signaturepresident2", type="boolean", nullable=true)
     */
    private $signaturepresident2;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="signaturetresorier2", type="boolean", nullable=true)
     */
    private $signaturetresorier2;

    public function getHistotransfereleveurid(): ?int
    {
        return $this->histotransfereleveurid;
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

    public function getGroupementid1(): ?string
    {
        return $this->groupementid1;
    }

    public function setGroupementid1(?string $groupementid1): self
    {
        $this->groupementid1 = $groupementid1;

        return $this;
    }

    public function getCodeeleveur1(): ?string
    {
        return $this->codeeleveur1;
    }

    public function setCodeeleveur1(?string $codeeleveur1): self
    {
        $this->codeeleveur1 = $codeeleveur1;

        return $this;
    }

    public function getGroupementid2(): ?string
    {
        return $this->groupementid2;
    }

    public function setGroupementid2(?string $groupementid2): self
    {
        $this->groupementid2 = $groupementid2;

        return $this;
    }

    public function getCodeeleveur2(): ?string
    {
        return $this->codeeleveur2;
    }

    public function setCodeeleveur2(?string $codeeleveur2): self
    {
        $this->codeeleveur2 = $codeeleveur2;

        return $this;
    }

    public function getDatetransfer(): ?\DateTimeInterface
    {
        return $this->datetransfer;
    }

    public function setDatetransfer(?\DateTimeInterface $datetransfer): self
    {
        $this->datetransfer = $datetransfer;

        return $this;
    }

    public function getSignatureeleveur(): ?bool
    {
        return $this->signatureeleveur;
    }

    public function setSignatureeleveur(?bool $signatureeleveur): self
    {
        $this->signatureeleveur = $signatureeleveur;

        return $this;
    }

    public function getSignaturepresident1(): ?bool
    {
        return $this->signaturepresident1;
    }

    public function setSignaturepresident1(?bool $signaturepresident1): self
    {
        $this->signaturepresident1 = $signaturepresident1;

        return $this;
    }

    public function getSignaturetresorier1(): ?bool
    {
        return $this->signaturetresorier1;
    }

    public function setSignaturetresorier1(?bool $signaturetresorier1): self
    {
        $this->signaturetresorier1 = $signaturetresorier1;

        return $this;
    }

    public function getSignaturepresident2(): ?bool
    {
        return $this->signaturepresident2;
    }

    public function setSignaturepresident2(?bool $signaturepresident2): self
    {
        $this->signaturepresident2 = $signaturepresident2;

        return $this;
    }

    public function getSignaturetresorier2(): ?bool
    {
        return $this->signaturetresorier2;
    }

    public function setSignaturetresorier2(?bool $signaturetresorier2): self
    {
        $this->signaturetresorier2 = $signaturetresorier2;

        return $this;
    }


}
