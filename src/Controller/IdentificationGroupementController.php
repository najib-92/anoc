<?php

namespace App\Controller;

use App\Entity\Groupements;
use App\Entity\Secteurs;
use App\Entity\Usertechnicien;
use App\Entity\Eleveurs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\groupementRepository ;
use Symfony\Component\HttpFoundation\Request;


class IdentificationGroupementController extends AbstractController
{
    /**
     * @Route("/identification/groupement", name="identification_groupement")
     */
    public function index(Request $request)
    {
        $technicien =   $this->getDoctrine()->getRepository(Usertechnicien::class)->findOneBy(array("user"=>$this->getUser()->getId()))->getTechnicien();
        $idtech= $technicien->getTechnicienid();
        $groupements = $this->getDoctrine()->getRepository(Groupements::class)->findBy(array("technicienid"=>$idtech));
        $Secteurs = $this->getDoctrine()->getRepository(Secteurs::class)->findAll();
        $eleveurs = $this->getDoctrine()->getRepository(eleveurs::class)->findAll();
        //$groupementdusecteur = $this->getDoctrine()->getRepository(Groupements::class)->findBy(["secteurid" => $Secteurs->getSecteurid()]);




        /*$technicien =   $this->getDoctrine()->getRepository(Usertechnicien::class)->findOneBy(array("user"=>$this->getUser()->getId()))->getTechnicien();
        $idtech= $technicien->getTechnicienid();
        $Secteurs = $this->getDoctrine()->getRepository(Secteurs::class)->findBy(array("secteurid"=>$id));
        */

        //$Secteurs = $this->getDoctrine()->getRepository(Secteurs::class)->findAll();


        //$nombresadherent = $this->getDoctrine()->getRepository(Groupements::class)->myFindNombreAdhrent();

		//$nombresadherent = $groupementRepository->myFindNombreAdhrent();
        //$nombresadherent = $this->getDoctrine()->getRepository(Groupements::class)->findAll();
        return $this->render('identification_groupement/index.html.twig',[
            "groupements"=>$groupements,
            "idtechnicien"=>$idtech,
            "secteurs"=>$Secteurs,
            "eleveurs"=>$eleveurs
        ]);
    }


}
