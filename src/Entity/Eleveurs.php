<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Eleveurs
 *
 * @ORM\Table(name="eleveurs", indexes={@ORM\Index(name="fk_relationship_47", columns={"groupementid"}), @ORM\Index(name="fk_relationship_53", columns={"douarid"}), @ORM\Index(name="fk_relationship_16", columns={"secteurid"}), @ORM\Index(name="fk_relationship_49", columns={"villeid"})})
 * @ORM\Entity
 */
class Eleveurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="eleveurid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eleveurid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codeeleveur", type="text", length=65535, nullable=true)
     */
    private $codeeleveur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcin", type="text", length=65535, nullable=true)
     */
    private $numcin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datecin", type="date", nullable=true)
     */
    private $datecin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="validitecin", type="date", nullable=true)
     */
    private $validitecin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomfr", type="text", length=65535, nullable=true)
     */
    private $nomfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomfr", type="text", length=65535, nullable=true)
     */
    private $prenomfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomar", type="text", length=65535, nullable=true)
     */
    private $nomar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomar", type="text", length=65535, nullable=true)
     */
    private $prenomar;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateadhesion", type="date", nullable=true)
     */
    private $dateadhesion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adressefr", type="text", length=65535, nullable=true)
     */
    private $adressefr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adressear", type="text", length=65535, nullable=true)
     */
    private $adressear;

    /**
     * @var int|null
     *
     * @ORM\Column(name="effectifovin", type="integer", nullable=true)
     */
    private $effectifovin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="effectifcaprin", type="integer", nullable=true)
     */
    private $effectifcaprin;

    /**
     * @var string
     *
     * @ORM\Column(name="typeeleveur", type="string", length=255, nullable=false)
     */
    private $typeeleveur;

    /**
     * @var \Secteurs
     *
     * @ORM\ManyToOne(targetEntity="Secteurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="secteurid", referencedColumnName="secteurid")
     * })
     */
    private $secteurid;

    /**
     * @var \Groupements
     *
     * @ORM\ManyToOne(targetEntity="Groupements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     * })
     */
    private $groupementid;

    /**
     * @var \Villes
     *
     * @ORM\ManyToOne(targetEntity="Villes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="villeid", referencedColumnName="villeid")
     * })
     */
    private $villeid;

    /**
     * @var \Douars
     *
     * @ORM\ManyToOne(targetEntity="Douars")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="douarid", referencedColumnName="douarid")
     * })
     */
    private $douarid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Conseilgroupement", mappedBy="eleveurid")
     */
    private $conseilgroupementid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Droitfonctionement", inversedBy="eleveurid")
     * @ORM\JoinTable(name="relationship_32",
     *   joinColumns={
     *     @ORM\JoinColumn(name="eleveurid", referencedColumnName="eleveurid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="droitfonctionementid", referencedColumnName="droitfonctionementid")
     *   }
     * )
     */
    private $droitfonctionementid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Conseilanoc", mappedBy="eleveurid")
     */
    private $conseilanocid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Superviseurs", mappedBy="eleveurid")
     */
    private $histosuperviseurid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conseilgroupementid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->droitfonctionementid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->conseilanocid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->histosuperviseurid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getEleveurid(): ?int
    {
        return $this->eleveurid;
    }

    public function getCodeeleveur(): ?string
    {
        return $this->codeeleveur;
    }

    public function setCodeeleveur(?string $codeeleveur): self
    {
        $this->codeeleveur = $codeeleveur;

        return $this;
    }

    public function getNumcin(): ?string
    {
        return $this->numcin;
    }

    public function setNumcin(?string $numcin): self
    {
        $this->numcin = $numcin;

        return $this;
    }

    public function getDatecin(): ?\DateTimeInterface
    {
        return $this->datecin;
    }

    public function setDatecin(?\DateTimeInterface $datecin): self
    {
        $this->datecin = $datecin;

        return $this;
    }

    public function getValiditecin(): ?\DateTimeInterface
    {
        return $this->validitecin;
    }

    public function setValiditecin(?\DateTimeInterface $validitecin): self
    {
        $this->validitecin = $validitecin;

        return $this;
    }

    public function getNomfr(): ?string
    {
        return $this->nomfr;
    }

    public function setNomfr(?string $nomfr): self
    {
        $this->nomfr = $nomfr;

        return $this;
    }

    public function getPrenomfr(): ?string
    {
        return $this->prenomfr;
    }

    public function setPrenomfr(?string $prenomfr): self
    {
        $this->prenomfr = $prenomfr;

        return $this;
    }

    public function getNomar(): ?string
    {
        return $this->nomar;
    }

    public function setNomar(?string $nomar): self
    {
        $this->nomar = $nomar;

        return $this;
    }

    public function getPrenomar(): ?string
    {
        return $this->prenomar;
    }

    public function setPrenomar(?string $prenomar): self
    {
        $this->prenomar = $prenomar;

        return $this;
    }

    public function getDateadhesion(): ?\DateTimeInterface
    {
        return $this->dateadhesion;
    }

    public function setDateadhesion(?\DateTimeInterface $dateadhesion): self
    {
        $this->dateadhesion = $dateadhesion;

        return $this;
    }

    public function getAdressefr(): ?string
    {
        return $this->adressefr;
    }

    public function setAdressefr(?string $adressefr): self
    {
        $this->adressefr = $adressefr;

        return $this;
    }

    public function getAdressear(): ?string
    {
        return $this->adressear;
    }

    public function setAdressear(?string $adressear): self
    {
        $this->adressear = $adressear;

        return $this;
    }

    public function getEffectifovin(): ?int
    {
        return $this->effectifovin;
    }

    public function setEffectifovin(?int $effectifovin): self
    {
        $this->effectifovin = $effectifovin;

        return $this;
    }

    public function getEffectifcaprin(): ?int
    {
        return $this->effectifcaprin;
    }

    public function setEffectifcaprin(?int $effectifcaprin): self
    {
        $this->effectifcaprin = $effectifcaprin;

        return $this;
    }

    public function getTypeeleveur(): ?string
    {
        return $this->typeeleveur;
    }

    public function setTypeeleveur(string $typeeleveur): self
    {
        $this->typeeleveur = $typeeleveur;

        return $this;
    }

    public function getSecteurid(): ?Secteurs
    {
        return $this->secteurid;
    }

    public function setSecteurid(?Secteurs $secteurid): self
    {
        $this->secteurid = $secteurid;

        return $this;
    }

    public function getGroupementid(): ?Groupements
    {
        return $this->groupementid;
    }

    public function setGroupementid(?Groupements $groupementid): self
    {
        $this->groupementid = $groupementid;

        return $this;
    }

    public function getVilleid(): ?Villes
    {
        return $this->villeid;
    }

    public function setVilleid(?Villes $villeid): self
    {
        $this->villeid = $villeid;

        return $this;
    }

    public function getDouarid(): ?Douars
    {
        return $this->douarid;
    }

    public function setDouarid(?Douars $douarid): self
    {
        $this->douarid = $douarid;

        return $this;
    }

    /**
     * @return Collection|Conseilgroupement[]
     */
    public function getConseilgroupementid(): Collection
    {
        return $this->conseilgroupementid;
    }

    public function addConseilgroupementid(Conseilgroupement $conseilgroupementid): self
    {
        if (!$this->conseilgroupementid->contains($conseilgroupementid)) {
            $this->conseilgroupementid[] = $conseilgroupementid;
            $conseilgroupementid->addEleveurid($this);
        }

        return $this;
    }

    public function removeConseilgroupementid(Conseilgroupement $conseilgroupementid): self
    {
        if ($this->conseilgroupementid->contains($conseilgroupementid)) {
            $this->conseilgroupementid->removeElement($conseilgroupementid);
            $conseilgroupementid->removeEleveurid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Droitfonctionement[]
     */
    public function getDroitfonctionementid(): Collection
    {
        return $this->droitfonctionementid;
    }

    public function addDroitfonctionementid(Droitfonctionement $droitfonctionementid): self
    {
        if (!$this->droitfonctionementid->contains($droitfonctionementid)) {
            $this->droitfonctionementid[] = $droitfonctionementid;
        }

        return $this;
    }

    public function removeDroitfonctionementid(Droitfonctionement $droitfonctionementid): self
    {
        if ($this->droitfonctionementid->contains($droitfonctionementid)) {
            $this->droitfonctionementid->removeElement($droitfonctionementid);
        }

        return $this;
    }

    /**
     * @return Collection|Conseilanoc[]
     */
    public function getConseilanocid(): Collection
    {
        return $this->conseilanocid;
    }

    public function addConseilanocid(Conseilanoc $conseilanocid): self
    {
        if (!$this->conseilanocid->contains($conseilanocid)) {
            $this->conseilanocid[] = $conseilanocid;
            $conseilanocid->addEleveurid($this);
        }

        return $this;
    }

    public function removeConseilanocid(Conseilanoc $conseilanocid): self
    {
        if ($this->conseilanocid->contains($conseilanocid)) {
            $this->conseilanocid->removeElement($conseilanocid);
            $conseilanocid->removeEleveurid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Superviseurs[]
     */
    public function getHistosuperviseurid(): Collection
    {
        return $this->histosuperviseurid;
    }

    public function addHistosuperviseurid(Superviseurs $histosuperviseurid): self
    {
        if (!$this->histosuperviseurid->contains($histosuperviseurid)) {
            $this->histosuperviseurid[] = $histosuperviseurid;
            $histosuperviseurid->addEleveurid($this);
        }

        return $this;
    }

    public function removeHistosuperviseurid(Superviseurs $histosuperviseurid): self
    {
        if ($this->histosuperviseurid->contains($histosuperviseurid)) {
            $this->histosuperviseurid->removeElement($histosuperviseurid);
            $histosuperviseurid->removeEleveurid($this);
        }

        return $this;
    }

}
