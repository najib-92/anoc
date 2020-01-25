<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleveursprospectes
 *
 * @ORM\Table(name="eleveursprospectes")
 * @ORM\Entity
 */
class Eleveursprospectes
{
    /**
     * @var int
     *
     * @ORM\Column(name="eleveurprospecteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eleveurprospecteid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="conventionid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $conventionid;

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
     * @ORM\Column(name="qualite", type="text", length=65535, nullable=true)
     */
    private $qualite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="communerural", type="text", length=65535, nullable=true)
     */
    private $communerural;

    /**
     * @var string|null
     *
     * @ORM\Column(name="douar", type="text", length=65535, nullable=true)
     */
    private $douar;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datenaissance", type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gsm", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $gsm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="autreactivite", type="text", length=65535, nullable=true)
     */
    private $autreactivite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pratiqueagriculture", type="text", length=65535, nullable=true)
     */
    private $pratiqueagriculture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sau", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $sau;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suptotal", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $suptotal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="effectifbovin", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $effectifbovin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="effectifovin", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $effectifovin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="effectifcaprin", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $effectifcaprin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typelutte", type="text", length=65535, nullable=true)
     */
    private $typelutte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="preparationlutte", type="text", length=65535, nullable=true)
     */
    private $preparationlutte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="preparationmisebas", type="text", length=65535, nullable=true)
     */
    private $preparationmisebas;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="pratiquetraite", type="boolean", nullable=true)
     */
    private $pratiquetraite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="qtelaitparjour", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $qtelaitparjour;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="traiteparfemme", type="boolean", nullable=true)
     */
    private $traiteparfemme;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="fransformationlben", type="boolean", nullable=true)
     */
    private $fransformationlben;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="transformationjben", type="boolean", nullable=true)
     */
    private $transformationjben;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="transformationparfemme", type="boolean", nullable=true)
     */
    private $transformationparfemme;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ventelait", type="boolean", nullable=true)
     */
    private $ventelait;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ventelben", type="boolean", nullable=true)
     */
    private $ventelben;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ventejben", type="boolean", nullable=true)
     */
    private $ventejben;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="venteparfemme", type="boolean", nullable=true)
     */
    private $venteparfemme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="qtevenduparjour", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $qtevenduparjour;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prixunitairelait", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixunitairelait;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lbenvenduparjour", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $lbenvenduparjour;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prixunitairelben", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixunitairelben;

    /**
     * @var string|null
     *
     * @ORM\Column(name="jbenvenduparjour", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $jbenvenduparjour;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prixkgjben", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixkgjben;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="autoconsommation", type="boolean", nullable=true)
     */
    private $autoconsommation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="laitconsommeparjour", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $laitconsommeparjour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lbenconsommeparjour", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $lbenconsommeparjour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="jbenconsommeparjour", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $jbenconsommeparjour;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateheureenquette", type="date", nullable=true)
     */
    private $dateheureenquette;

    /**
     * @var string|null
     *
     * @ORM\Column(name="technicienid", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $technicienid;

    public function getEleveurprospecteid(): ?int
    {
        return $this->eleveurprospecteid;
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

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(?string $qualite): self
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getCommunerural(): ?string
    {
        return $this->communerural;
    }

    public function setCommunerural(?string $communerural): self
    {
        $this->communerural = $communerural;

        return $this;
    }

    public function getDouar(): ?string
    {
        return $this->douar;
    }

    public function setDouar(?string $douar): self
    {
        $this->douar = $douar;

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

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(?string $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getAutreactivite(): ?string
    {
        return $this->autreactivite;
    }

    public function setAutreactivite(?string $autreactivite): self
    {
        $this->autreactivite = $autreactivite;

        return $this;
    }

    public function getPratiqueagriculture(): ?string
    {
        return $this->pratiqueagriculture;
    }

    public function setPratiqueagriculture(?string $pratiqueagriculture): self
    {
        $this->pratiqueagriculture = $pratiqueagriculture;

        return $this;
    }

    public function getSau(): ?string
    {
        return $this->sau;
    }

    public function setSau(?string $sau): self
    {
        $this->sau = $sau;

        return $this;
    }

    public function getSuptotal(): ?string
    {
        return $this->suptotal;
    }

    public function setSuptotal(?string $suptotal): self
    {
        $this->suptotal = $suptotal;

        return $this;
    }

    public function getEffectifbovin(): ?string
    {
        return $this->effectifbovin;
    }

    public function setEffectifbovin(?string $effectifbovin): self
    {
        $this->effectifbovin = $effectifbovin;

        return $this;
    }

    public function getEffectifovin(): ?string
    {
        return $this->effectifovin;
    }

    public function setEffectifovin(?string $effectifovin): self
    {
        $this->effectifovin = $effectifovin;

        return $this;
    }

    public function getEffectifcaprin(): ?string
    {
        return $this->effectifcaprin;
    }

    public function setEffectifcaprin(?string $effectifcaprin): self
    {
        $this->effectifcaprin = $effectifcaprin;

        return $this;
    }

    public function getTypelutte(): ?string
    {
        return $this->typelutte;
    }

    public function setTypelutte(?string $typelutte): self
    {
        $this->typelutte = $typelutte;

        return $this;
    }

    public function getPreparationlutte(): ?string
    {
        return $this->preparationlutte;
    }

    public function setPreparationlutte(?string $preparationlutte): self
    {
        $this->preparationlutte = $preparationlutte;

        return $this;
    }

    public function getPreparationmisebas(): ?string
    {
        return $this->preparationmisebas;
    }

    public function setPreparationmisebas(?string $preparationmisebas): self
    {
        $this->preparationmisebas = $preparationmisebas;

        return $this;
    }

    public function getPratiquetraite(): ?bool
    {
        return $this->pratiquetraite;
    }

    public function setPratiquetraite(?bool $pratiquetraite): self
    {
        $this->pratiquetraite = $pratiquetraite;

        return $this;
    }

    public function getQtelaitparjour(): ?string
    {
        return $this->qtelaitparjour;
    }

    public function setQtelaitparjour(?string $qtelaitparjour): self
    {
        $this->qtelaitparjour = $qtelaitparjour;

        return $this;
    }

    public function getTraiteparfemme(): ?bool
    {
        return $this->traiteparfemme;
    }

    public function setTraiteparfemme(?bool $traiteparfemme): self
    {
        $this->traiteparfemme = $traiteparfemme;

        return $this;
    }

    public function getFransformationlben(): ?bool
    {
        return $this->fransformationlben;
    }

    public function setFransformationlben(?bool $fransformationlben): self
    {
        $this->fransformationlben = $fransformationlben;

        return $this;
    }

    public function getTransformationjben(): ?bool
    {
        return $this->transformationjben;
    }

    public function setTransformationjben(?bool $transformationjben): self
    {
        $this->transformationjben = $transformationjben;

        return $this;
    }

    public function getTransformationparfemme(): ?bool
    {
        return $this->transformationparfemme;
    }

    public function setTransformationparfemme(?bool $transformationparfemme): self
    {
        $this->transformationparfemme = $transformationparfemme;

        return $this;
    }

    public function getVentelait(): ?bool
    {
        return $this->ventelait;
    }

    public function setVentelait(?bool $ventelait): self
    {
        $this->ventelait = $ventelait;

        return $this;
    }

    public function getVentelben(): ?bool
    {
        return $this->ventelben;
    }

    public function setVentelben(?bool $ventelben): self
    {
        $this->ventelben = $ventelben;

        return $this;
    }

    public function getVentejben(): ?bool
    {
        return $this->ventejben;
    }

    public function setVentejben(?bool $ventejben): self
    {
        $this->ventejben = $ventejben;

        return $this;
    }

    public function getVenteparfemme(): ?bool
    {
        return $this->venteparfemme;
    }

    public function setVenteparfemme(?bool $venteparfemme): self
    {
        $this->venteparfemme = $venteparfemme;

        return $this;
    }

    public function getQtevenduparjour(): ?string
    {
        return $this->qtevenduparjour;
    }

    public function setQtevenduparjour(?string $qtevenduparjour): self
    {
        $this->qtevenduparjour = $qtevenduparjour;

        return $this;
    }

    public function getPrixunitairelait(): ?float
    {
        return $this->prixunitairelait;
    }

    public function setPrixunitairelait(?float $prixunitairelait): self
    {
        $this->prixunitairelait = $prixunitairelait;

        return $this;
    }

    public function getLbenvenduparjour(): ?string
    {
        return $this->lbenvenduparjour;
    }

    public function setLbenvenduparjour(?string $lbenvenduparjour): self
    {
        $this->lbenvenduparjour = $lbenvenduparjour;

        return $this;
    }

    public function getPrixunitairelben(): ?float
    {
        return $this->prixunitairelben;
    }

    public function setPrixunitairelben(?float $prixunitairelben): self
    {
        $this->prixunitairelben = $prixunitairelben;

        return $this;
    }

    public function getJbenvenduparjour(): ?string
    {
        return $this->jbenvenduparjour;
    }

    public function setJbenvenduparjour(?string $jbenvenduparjour): self
    {
        $this->jbenvenduparjour = $jbenvenduparjour;

        return $this;
    }

    public function getPrixkgjben(): ?float
    {
        return $this->prixkgjben;
    }

    public function setPrixkgjben(?float $prixkgjben): self
    {
        $this->prixkgjben = $prixkgjben;

        return $this;
    }

    public function getAutoconsommation(): ?bool
    {
        return $this->autoconsommation;
    }

    public function setAutoconsommation(?bool $autoconsommation): self
    {
        $this->autoconsommation = $autoconsommation;

        return $this;
    }

    public function getLaitconsommeparjour(): ?string
    {
        return $this->laitconsommeparjour;
    }

    public function setLaitconsommeparjour(?string $laitconsommeparjour): self
    {
        $this->laitconsommeparjour = $laitconsommeparjour;

        return $this;
    }

    public function getLbenconsommeparjour(): ?string
    {
        return $this->lbenconsommeparjour;
    }

    public function setLbenconsommeparjour(?string $lbenconsommeparjour): self
    {
        $this->lbenconsommeparjour = $lbenconsommeparjour;

        return $this;
    }

    public function getJbenconsommeparjour(): ?string
    {
        return $this->jbenconsommeparjour;
    }

    public function setJbenconsommeparjour(?string $jbenconsommeparjour): self
    {
        $this->jbenconsommeparjour = $jbenconsommeparjour;

        return $this;
    }

    public function getDateheureenquette(): ?\DateTimeInterface
    {
        return $this->dateheureenquette;
    }

    public function setDateheureenquette(?\DateTimeInterface $dateheureenquette): self
    {
        $this->dateheureenquette = $dateheureenquette;

        return $this;
    }

    public function getTechnicienid(): ?string
    {
        return $this->technicienid;
    }

    public function setTechnicienid(?string $technicienid): self
    {
        $this->technicienid = $technicienid;

        return $this;
    }


}
