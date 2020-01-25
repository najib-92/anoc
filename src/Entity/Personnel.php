<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnel
 *
 * @ORM\Table(name="personnel")
 * @ORM\Entity
 */
class Personnel
{
    /**
     * @var int
     *
     * @ORM\Column(name="personnelid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $personnelid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="matricule", type="string", length=255, nullable=true)
     */
    private $matricule;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcin", type="string", length=20, nullable=true)
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
     * @ORM\Column(name="nomar", type="text", length=65535, nullable=true)
     */
    private $nomar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomfr", type="text", length=65535, nullable=true)
     */
    private $prenomfr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomar", type="text", length=65535, nullable=true)
     */
    private $prenomar;

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
     * @var string|null
     *
     * @ORM\Column(name="sexe", type="text", length=65535, nullable=true)
     */
    private $sexe;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datenaissance", type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieunaissance", type="text", length=65535, nullable=true)
     */
    private $lieunaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcnss", type="string", length=255, nullable=true)
     */
    private $numcnss;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcimr", type="string", length=255, nullable=true)
     */
    private $numcimr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telpersonnel", type="string", length=255, nullable=true)
     */
    private $telpersonnel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telprofessionnel", type="string", length=255, nullable=true)
     */
    private $telprofessionnel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailpersonnel", type="text", length=65535, nullable=true)
     */
    private $emailpersonnel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailprofessionnel", type="text", length=65535, nullable=true)
     */
    private $emailprofessionnel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typecontrat", type="text", length=65535, nullable=true)
     */
    private $typecontrat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fonction", type="text", length=65535, nullable=true)
     */
    private $fonction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="affectation", type="text", length=65535, nullable=true)
     */
    private $affectation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateentree", type="date", nullable=true)
     */
    private $dateentree;

    /**
     * @var string|null
     *
     * @ORM\Column(name="situationfamiliale", type="text", length=65535, nullable=true)
     */
    private $situationfamiliale;

    /**
     * @var float|null
     *
     * @ORM\Column(name="salaire", type="float", precision=10, scale=0, nullable=true)
     */
    private $salaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="banque", type="text", length=65535, nullable=true)
     */
    private $banque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numrib", type="string", length=255, nullable=true)
     */
    private $numrib;

    /**
     * @var string|null
     *
     * @ORM\Column(name="diplomes", type="text", length=65535, nullable=true)
     */
    private $diplomes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateobtdiplome", type="date", nullable=true)
     */
    private $dateobtdiplome;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specialite", type="text", length=65535, nullable=true)
     */
    private $specialite;

    public function getPersonnelid(): ?int
    {
        return $this->personnelid;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

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

    public function getNomar(): ?string
    {
        return $this->nomar;
    }

    public function setNomar(?string $nomar): self
    {
        $this->nomar = $nomar;

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

    public function getPrenomar(): ?string
    {
        return $this->prenomar;
    }

    public function setPrenomar(?string $prenomar): self
    {
        $this->prenomar = $prenomar;

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getLieunaissance(): ?string
    {
        return $this->lieunaissance;
    }

    public function setLieunaissance(?string $lieunaissance): self
    {
        $this->lieunaissance = $lieunaissance;

        return $this;
    }

    public function getNumcnss(): ?string
    {
        return $this->numcnss;
    }

    public function setNumcnss(?string $numcnss): self
    {
        $this->numcnss = $numcnss;

        return $this;
    }

    public function getNumcimr(): ?string
    {
        return $this->numcimr;
    }

    public function setNumcimr(?string $numcimr): self
    {
        $this->numcimr = $numcimr;

        return $this;
    }

    public function getTelpersonnel(): ?string
    {
        return $this->telpersonnel;
    }

    public function setTelpersonnel(?string $telpersonnel): self
    {
        $this->telpersonnel = $telpersonnel;

        return $this;
    }

    public function getTelprofessionnel(): ?string
    {
        return $this->telprofessionnel;
    }

    public function setTelprofessionnel(?string $telprofessionnel): self
    {
        $this->telprofessionnel = $telprofessionnel;

        return $this;
    }

    public function getEmailpersonnel(): ?string
    {
        return $this->emailpersonnel;
    }

    public function setEmailpersonnel(?string $emailpersonnel): self
    {
        $this->emailpersonnel = $emailpersonnel;

        return $this;
    }

    public function getEmailprofessionnel(): ?string
    {
        return $this->emailprofessionnel;
    }

    public function setEmailprofessionnel(?string $emailprofessionnel): self
    {
        $this->emailprofessionnel = $emailprofessionnel;

        return $this;
    }

    public function getTypecontrat(): ?string
    {
        return $this->typecontrat;
    }

    public function setTypecontrat(?string $typecontrat): self
    {
        $this->typecontrat = $typecontrat;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getAffectation(): ?string
    {
        return $this->affectation;
    }

    public function setAffectation(?string $affectation): self
    {
        $this->affectation = $affectation;

        return $this;
    }

    public function getDateentree(): ?\DateTimeInterface
    {
        return $this->dateentree;
    }

    public function setDateentree(?\DateTimeInterface $dateentree): self
    {
        $this->dateentree = $dateentree;

        return $this;
    }

    public function getSituationfamiliale(): ?string
    {
        return $this->situationfamiliale;
    }

    public function setSituationfamiliale(?string $situationfamiliale): self
    {
        $this->situationfamiliale = $situationfamiliale;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(?float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): self
    {
        $this->banque = $banque;

        return $this;
    }

    public function getNumrib(): ?string
    {
        return $this->numrib;
    }

    public function setNumrib(?string $numrib): self
    {
        $this->numrib = $numrib;

        return $this;
    }

    public function getDiplomes(): ?string
    {
        return $this->diplomes;
    }

    public function setDiplomes(?string $diplomes): self
    {
        $this->diplomes = $diplomes;

        return $this;
    }

    public function getDateobtdiplome(): ?\DateTimeInterface
    {
        return $this->dateobtdiplome;
    }

    public function setDateobtdiplome(?\DateTimeInterface $dateobtdiplome): self
    {
        $this->dateobtdiplome = $dateobtdiplome;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }
    public function getNumcinNomfrPrenomfr(): ?string	
    {	
        if($this->fonction=="Technicien"){
            $cinNomPrenom=$this->nomfr." ".$this->prenomfr." ".$this->numcin;
            return $cinNomPrenom;
        } 
        
        return null;
        
    }
}
