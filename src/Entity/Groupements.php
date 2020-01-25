<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Groupements
 *
 * @ORM\Table(name="groupements", indexes={@ORM\Index(name="technicienid", columns={"technicienid"}), @ORM\Index(name="fk_relationship_54", columns={"secteurid"})})
 * @ORM\Entity
 *@ORM\Entity(repositoryClass="App\Repository\groupementRepository")
 */
class Groupements
{
    /**
     * @var int
     *
     * @ORM\Column(name="groupementid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupementid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupementmereid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $groupementmereid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codegroupement", type="text", length=65535, nullable=true)
     */
    private $codegroupement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomgroupementfr", type="text", length=65535, nullable=true)
     */
    private $nomgroupementfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomgroupementar", type="text", length=65535, nullable=true)
     */
    private $nomgroupementar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adressepostale", type="text", length=65535, nullable=true)
     */
    private $adressepostale;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datecreation", type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pvcreation", type="text", length=65535, nullable=true)
     */
    private $pvcreation;

    /**
     * @var string
     *
     * @ORM\Column(name="typetauxfonctionnement", type="string", length=20, nullable=false)
     */
    private $typetauxfonctionnement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="droitfonctionement", type="float", precision=10, scale=0, nullable=true)
     */
    private $droitfonctionement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="autrecotisations", type="float", precision=10, scale=0, nullable=true)
     */
    private $autrecotisations;

    /**
     * @var int|null
     *
     * @ORM\Column(name="effectifovinencadre", type="integer", nullable=true)
     */
    private $effectifovinencadre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="effectifcaprinencadre", type="integer", nullable=true)
     */
    private $effectifcaprinencadre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieupvcreation", type="text", length=65535, nullable=true)
     */
    private $lieupvcreation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datepvcreation", type="date", nullable=true)
     */
    private $datepvcreation;

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
     * @var \Techniciens
     *
     * @ORM\ManyToOne(targetEntity="Techniciens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="technicienid", referencedColumnName="technicienid")
     * })
     */
    private $technicienid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Droitfonctionement", inversedBy="groupementid")
     * @ORM\JoinTable(name="relationship_31",
     *   joinColumns={
     *     @ORM\JoinColumn(name="groupementid", referencedColumnName="groupementid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="droitfonctionementid", referencedColumnName="droitfonctionementid")
     *   }
     * )
     */
    private $droitfonctionementid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->droitfonctionementid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getGroupementid(): ?int
    {
        return $this->groupementid;
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

    public function getCodegroupement(): ?string
    {
        return $this->codegroupement;
    }

    public function setCodegroupement(?string $codegroupement): self
    {
        $this->codegroupement = $codegroupement;

        return $this;
    }

    public function getNomgroupementfr(): ?string
    {
        return $this->nomgroupementfr;
    }

    public function setNomgroupementfr(?string $nomgroupementfr): self
    {
        $this->nomgroupementfr = $nomgroupementfr;

        return $this;
    }

    public function getNomgroupementar(): ?string
    {
        return $this->nomgroupementar;
    }

    public function setNomgroupementar(?string $nomgroupementar): self
    {
        $this->nomgroupementar = $nomgroupementar;

        return $this;
    }

    public function getAdressepostale(): ?string
    {
        return $this->adressepostale;
    }

    public function setAdressepostale(?string $adressepostale): self
    {
        $this->adressepostale = $adressepostale;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(?\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getPvcreation(): ?string
    {
        return $this->pvcreation;
    }

    public function setPvcreation(?string $pvcreation): self
    {
        $this->pvcreation = $pvcreation;

        return $this;
    }

    public function getTypetauxfonctionnement(): ?string
    {
        return $this->typetauxfonctionnement;
    }

    public function setTypetauxfonctionnement(string $typetauxfonctionnement): self
    {
        $this->typetauxfonctionnement = $typetauxfonctionnement;

        return $this;
    }

    public function getDroitfonctionement(): ?float
    {
        return $this->droitfonctionement;
    }

    public function setDroitfonctionement(?float $droitfonctionement): self
    {
        $this->droitfonctionement = $droitfonctionement;

        return $this;
    }

    public function getAutrecotisations(): ?float
    {
        return $this->autrecotisations;
    }

    public function setAutrecotisations(?float $autrecotisations): self
    {
        $this->autrecotisations = $autrecotisations;

        return $this;
    }

    public function getEffectifovinencadre(): ?int
    {
        return $this->effectifovinencadre;
    }

    public function setEffectifovinencadre(?int $effectifovinencadre): self
    {
        $this->effectifovinencadre = $effectifovinencadre;

        return $this;
    }

    public function getEffectifcaprinencadre(): ?int
    {
        return $this->effectifcaprinencadre;
    }

    public function setEffectifcaprinencadre(?int $effectifcaprinencadre): self
    {
        $this->effectifcaprinencadre = $effectifcaprinencadre;

        return $this;
    }

    public function getLieupvcreation(): ?string
    {
        return $this->lieupvcreation;
    }

    public function setLieupvcreation(?string $lieupvcreation): self
    {
        $this->lieupvcreation = $lieupvcreation;

        return $this;
    }

    public function getDatepvcreation(): ?\DateTimeInterface
    {
        return $this->datepvcreation;
    }

    public function setDatepvcreation(?\DateTimeInterface $datepvcreation): self
    {
        $this->datepvcreation = $datepvcreation;

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

    public function getTechnicienid(): ?Techniciens
    {
        return $this->technicienid;
    }

    public function setTechnicienid(?Techniciens $technicienid): self
    {
        $this->technicienid = $technicienid;

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
    public function __toString()
    {
        return $this->getNomgroupementfr();
    }
}
