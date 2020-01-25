<?php

namespace App\Controller;

use App\Entity\Eleveurs;
use App\Entity\Groupements;
use App\Entity\Usertechnicien;
use App\Form\EleveursType;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Omines\DataTablesBundle\Column\TextColumn;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Column\DateTimeColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/eleveurs")
 */
class EleveursController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="eleveurs_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {

        $technicien =   $this->getDoctrine()->getRepository(Usertechnicien::class)->findOneBy(array("user"=>$this->getUser()->getId()))->getTechnicien();
        $id= $technicien->getTechnicienid();
        $groupements = $this->getDoctrine()->getRepository(Groupements::class)->findBy(array("technicienid"=>$id));

        return $this->render('eleveurs/index.html.twig',[
            "groupements"=>$groupements
        ]);
    }
    /**
     * @Route("/datatable", name="eleveurs_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $table = $this->createDataTable()
            ->add('eleveurid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('secteurid',TextColumn::class,['label' => 'Nom de secteur','data' => function($v,$o){
                return is_null($v->getSecteurid())?"":$v->getSecteurid()->getSecteurfr();
            }, 'className' => 'bold'])
            ->add('groupementid',TextColumn::class,['label' => 'Nom de groupement','data' => function($v,$o){
                return is_null($v->getGroupementid())?"":$v->getGroupementid()->getNomgroupementfr();
            }, 'className' => 'bold'])
            ->add('villeid',TextColumn::class,['label' => 'Nom de ville','data' => function($v,$o){
                return is_null($v->getVilleid())?"":$v->getVilleid()->getVillefr();
            }, 'className' => 'bold'])
            ->add('douarid',TextColumn::class,['label' => 'Nom de douar','data' => function($v,$o){
                return is_null($v->getDouarid())?"":$v->getDouarid()->getDouarfr();
            }, 'className' => 'bold'])
            ->add('codeeleveur',TextColumn::class,['label' => 'Code eleveur', 'className' => 'bold'])
            ->add('numcin',TextColumn::class,['label' => 'CIN', 'className' => 'bold'])
            ->add('datecin',DateTimeColumn::class,['label' => 'Date de CIN', 'format' => 'd-m-Y', 'className' => 'bold'])
            ->add('validitecin',DateTimeColumn::class,['label' => 'Validite CIN', 'format' => 'd-m-Y', 'className' => 'bold'])
            ->add('nomfr',TextColumn::class,['label' => 'Nom en français', 'className' => 'bold'])
            ->add('nomar',TextColumn::class,['label' => 'الإسم العائلي', 'className' => 'bold text_Arb_Datatable'])
            ->add('prenomfr',TextColumn::class,['label' => 'Prenom en français', 'className' => 'bold'])
            ->add('prenomar',TextColumn::class,['label' => 'الإسم الشخصي', 'className' => 'bold text_Arb_Datatable'])
            ->add('dateadhesion',DateTimeColumn::class,['label' => 'Date adhesion', 'format' => 'd-m-Y', 'className' => 'bold'])
            ->add('adressefr',TextColumn::class,['label' => 'Adresse en français', 'className' => 'bold'])
            ->add('adressear',TextColumn::class,['label' => 'العنوان', 'className' => 'bold text_Arb_Datatable'])
            ->add('effectifovin',TextColumn::class,['label' => 'Effectif ovin', 'className' => 'bold'])
            ->add('effectifcaprin',TextColumn::class,['label' => 'Effectif caprin', 'className' => 'bold'])
            ->add('typeeleveur',TextColumn::class,['label' => 'Type eleveur', 'className' => 'bold']);
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
           if($this->isGranted("ROLE_TECHNICIEN")) {
               $table->
               createAdapter(ORMAdapter::class, [
                   'entity' => Eleveurs::class,
                   'query' => function (QueryBuilder $builder) use ($request) {
                       $builder
                           ->select('e')
                           ->from(Eleveurs::class, 'e')
                           ->where('e.typeeleveur IN (:typeeleveur)')
                           ->andWhere("e.groupementid = :groupements")
                           ->setParameter('typeeleveur', preg_split('/[ ,]/', $request->get("name"), null, PREG_SPLIT_NO_EMPTY))
                           ->setParameter("groupements",$request->get("groupement"));
                   },
               ])
                   ->handleRequest($request);
           }
           else{
               $table->
               createAdapter(ORMAdapter::class, [
                   'entity' => Eleveurs::class,
                   'query' => function (QueryBuilder $builder) use ($request) {
                       $builder
                           ->select('e')
                           ->from(Eleveurs::class, 'e')
                           ->where('e.typeeleveur IN (:typeeleveur)')
                           ->setParameter('typeeleveur', preg_split('/[ ,]/', $request->get("name"), null, PREG_SPLIT_NO_EMPTY));
                   },
               ])
                   ->handleRequest($request);
           }
        $tableResponse =$table->getResponse();
        $tableData = json_decode($tableResponse->getContent(),true);
        unset($tableData["options"]);
        unset($tableData["template"]);
        foreach ($tableData["data"] as &$data) {
            unset($data["DT_RowId"]);
            $data = array_values($data);
        }
        $tableResponse->setData($tableData);
        return $tableResponse;
    }

    /**
     * @Route("/new", name="eleveurs_new", methods={"GET","POST"})
     * @isGranted("ROLE_CADRE_GRPT")
     */
    public function new(Request $request): Response
    {

        $user = $this->getUser();
        $eleveur = new Eleveurs();
        $form = $this->createForm(EleveursType::class, $eleveur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                //pour accepter la ville ou douar null
                $data = $request->request->all();
                if($data["eleveurs"]["villeid"]=="0") $eleveur->setVilleid(null);
                if($data["eleveurs"]["douarid"]=="0")$eleveur->setDouarid(null);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($eleveur);
                $entityManager->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le eleveur a été ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Ce code de eleveur existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('eleveurs/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{eleveurid}", name="eleveurs_show", methods={"GET"})
     */
    public function show(Eleveurs $eleveur): Response
    {
        return $this->render('eleveurs/show.html.twig', [
            'eleveur' => $eleveur,
        ]);
    }

    /**
     * @Route("/{eleveurid}/edit", name="eleveurs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Eleveurs $eleveur): Response
    {
        $form = $this->createForm(EleveursType::class, $eleveur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $data = $request->request->all();
                if($this->isGranted("ROLE_TECHNICIEN")) {
                    $manager = $this->getDoctrine()->getManager();
                    $eleveur1 = $manager->getRepository(Eleveurs::class)->findOneBy(array("eleveurid"=>$eleveur->getEleveurid()));
                    $eleveur1->setEffectifcaprin($data["eleveurs"]["effectifcaprin"]);
                    $eleveur1->setEffectifovin($data["eleveurs"]["effectifovin"]);

                    $manager->persist($eleveur1);
                    $manager->flush();
                }

                else {
                    if($data["eleveurs"]["villeid"]=="0") $eleveur->setVilleid(null);
                    if($data["eleveurs"]["douarid"]=="0")$eleveur->setDouarid(null);
                    $this->getDoctrine()->getManager()->flush();
                }
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le groupement a été modifier avec succès',
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('eleveurs/_form.html.twig', [
            'eleveur' => $eleveur,
            'form' => $form->createView(),
            'nam' => $eleveur->getEleveurid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1'
        ]);
    }

    /**
     * @Route("/{eleveurid}/delete", name="eleveurs_delete", methods={"DELETE","GET","POST"})
     * @isGranted("ROLE_CADRE_GRPT")
     */
    public function delete(Request $request, Eleveurs $eleveur): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$eleveur->getEleveurid(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($eleveur);
                $entityManager->flush();

                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Suppression est effectué avec succès'
                ]),Response::HTTP_OK);
            }
        }
        catch(\Exception $e){
            return new Response(json_encode([
                'code' => 2,
                'message'=>'Suppression impossible cet élément est déjà utilisé'
            ]),Response::HTTP_OK);
        } 
        return $this->render('eleveurs/_delete_form.html.twig', [
            'eleveur' => $eleveur,
        ]);
    }
}
