<?php

namespace App\Controller;

use App\Entity\Tauxfonctionement;
use App\Form\TauxfonctionementType;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use function Sodium\add;

/**
 * @Route("/tauxfonctionement")
 */
class TauxfonctionementController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="tauxfonctionement_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('tauxfonctionement/index.html.twig');
    }
        /**
     * @Route("/datatable", name="race_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $requestData = filter_var_array($_REQUEST);
        $search1=$requestData["search"]["value"];
        $request->request->set("search",["value"=>"","regex"=>"false"]);
        $table = $this->createDataTable()
            ->add('tauxfonctionementid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('secteurid',TextColumn::class,['label' => 'Nom de secteur','data' => function($v,$o){
                return is_null($v->getSecteurid())?"":$v->getSecteurid()->getSecteurfr();
            }, 'className' => 'bold'])
            ->add('groupementid',TextColumn::class,['label' => 'Nom de groupement','data' => function($v,$o){
                return is_null($v->getGroupementid())?"":$v->getGroupementid()->getNomgroupementfr();
            }, 'className' => 'bold'])
            ->add('racefr',TextColumn::class,['label' => 'Race en français', 'className' => 'bold'])
            ->add('especefr',TextColumn::class,['label' => 'Espece en français', 'className' => 'bold'])
            ->add('racear',TextColumn::class,['label' => 'racear', 'className' => 'bold text_Arb_Datatable'])
            ->add('especear',TextColumn::class,['label' => 'especear', 'className' => 'bold'])
            ->add('tauxfonctionnement',TextColumn::class,['label' => 'especear', 'className' => 'bold']);
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            if($search1!=""){
                $search2=substr_replace($search1,"%",0,0);
                $s=substr_replace($search2,"%",strlen($search2));
                $table
                ->createAdapter(ORMAdapter::class, [
                    'entity' => Tauxfonctionement::class,
                    'query' => function (QueryBuilder $builder) use ($s){
                        $builder
                            ->select('r')
                            ->addSelect('s')
                            ->addSelect('g')
                            ->from(Tauxfonctionement::class, 'r')
                            ->innerJoin('r.secteurid', 's', 'r.secteurid = s.secteurid')
                            ->innerJoin('r.groupementid', 'g', 'r.groupementid = g.groupementid')
                            ->where('s.secteurfr  like :secteurfr or g.nomgroupementfr like :nomgroupementfr or r.racefr like :racefr or r.especefr like :especefr or r.racear like :racear or r.especear like :especear or r.tauxfonctionnement like :tauxfonctionnement')
                            ->setParameters(array(':secteurfr'=>$s,':nomgroupementfr'=>$s,':racefr'=>$s,':especefr'=>$s,':racear'=>$s,':especear'=>$s,':tauxfonctionnement'=>$s))

                        ;
                    },
                ])
                ->handleRequest($request);
            }else{
                $table
                    ->createAdapter(ORMAdapter::class, [
                        'entity' => Tauxfonctionement::class,
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
     * @Route("/new", name="tauxfonctionement_new", methods={"GET","POST"})
     */
    /*public function new(Request $request): Response
    {
        $tauxfonctionement = new Tauxfonctionement();
        $form = $this->createForm(TauxfonctionementType::class, $tauxfonctionement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tauxfonctionement);
            $entityManager->flush();

            return $this->redirectToRoute('tauxfonctionement_index');
        }

        return $this->render('tauxfonctionement/new.html.twig', [
            'tauxfonctionement' => $tauxfonctionement,
            'form' => $form->createView(),
        ]);
    }*/

    /**
     * @Route("/{tauxfonctionementid}", name="tauxfonctionement_show", methods={"GET"})
     */
    /*public function show(Tauxfonctionement $tauxfonctionement): Response
    {
        return $this->render('tauxfonctionement/show.html.twig', [
            'tauxfonctionement' => $tauxfonctionement,
        ]);
    }*/

    /**
     * @Route("/{tauxfonctionementid}/edit", name="tauxfonctionement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tauxfonctionement $tauxfonctionement): Response
    {
        $form = $this->createForm(TauxfonctionementType::class, $tauxfonctionement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $data = $request->request->all();
                $manager = $this->getDoctrine()->getManager();
                $tauxfonctionement1 = $manager->getRepository(Tauxfonctionement::class)->findOneBy(array("tauxfonctionementid"=>$tauxfonctionement->getTauxfonctionementid()));
                $tauxfonctionement1->setTauxfonctionnement($data["tauxfonctionement"]["tauxfonctionnement"]);

                $manager->persist($tauxfonctionement1);
                $manager->flush();

                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le Taux fonctionement a été modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('tauxfonctionement/_form.html.twig', [
            'tauxfonctionement' => $tauxfonctionement,
            'form' => $form->createView(),
            'nam' => $tauxfonctionement->getTauxfonctionementid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1',
        ]);
    }

    /**
     * @Route("/{tauxfonctionementid}", name="tauxfonctionement_delete", methods={"DELETE"})
     */
    /*public function delete(Request $request, Tauxfonctionement $tauxfonctionement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tauxfonctionement->getTauxfonctionementid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tauxfonctionement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tauxfonctionement_index');
    }*/
}
