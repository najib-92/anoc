<?php

namespace App\Controller;

use App\Entity\Races;
use App\Form\RacesType;
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
 * @Route("/races")
 */
class RacesController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="races_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('races/index.html.twig');
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
            ->add('raceid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('secteurid',TextColumn::class,['label' => 'Nom de secteur','data' => function($v,$o){
                return is_null($v->getSecteurid())?"":$v->getSecteurid()->getSecteurfr();
            }, 'className' => 'bold'])
            ->add('groupementid',TextColumn::class,['label' => 'Nom de groupement','data' => function($v,$o){
                return is_null($v->getGroupementid())?"":$v->getGroupementid()->getNomgroupementfr();
            }, 'className' => 'bold'])
            ->add('racefr',TextColumn::class,['label' => 'Race en français', 'className' => 'bold'])
            ->add('especefr',TextColumn::class,['label' => 'Espece en français', 'className' => 'bold'])
            ->add('racear',TextColumn::class,['label' => 'racear', 'className' => 'bold text_Arb_Datatable'])
            ->add('especear',TextColumn::class,['label' => 'especear', 'className' => 'bold']);

            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            if($search1!=""){
                $search2=substr_replace($search1,"%",0,0);
                $s=substr_replace($search2,"%",strlen($search2));
                $table
                ->createAdapter(ORMAdapter::class, [
                    'entity' => Races::class,
                    'query' => function (QueryBuilder $builder) use ($s){
                        $builder
                            ->select('r')
                            ->addSelect('s')
                            ->addSelect('g')
                            ->from(Races::class, 'r')
                            ->innerJoin('r.secteurid', 's', 'r.secteurid = s.secteurid')
                            ->innerJoin('r.groupementid', 'g', 'r.groupementid = g.groupementid')
                            ->where('s.secteurfr  like :secteurfr or g.nomgroupementfr like :nomgroupementfr or r.racefr like :racefr or r.especefr like :especefr or r.racear like :racear or r.especear like :especear')
                            ->setParameters(array(':secteurfr'=>$s,':nomgroupementfr'=>$s,':racefr'=>$s,':especefr'=>$s,':racear'=>$s,':especear'=>$s))

                        ;
                    },
                ])
                ->handleRequest($request);
            }else{
                $table
                    ->createAdapter(ORMAdapter::class, [
                        'entity' => Races::class,
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
     * @Route("/new", name="races_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $race = new Races();
        $form = $this->createForm(RacesType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($race);
                $entityManager->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le Rece a été ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Ce Race existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('races/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{raceid}", name="races_show", methods={"GET"})
     */
    public function show(Races $race): Response
    {
        return $this->render('races/show.html.twig', [
            'race' => $race,
        ]);
    }

    /**
     * @Route("/{raceid}/edit", name="races_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Races $race): Response
    {
        $form = $this->createForm(RacesType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $this->getDoctrine()->getManager()->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le Race a été modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('races/_form.html.twig', [
            'race' => $race,
            'form' => $form->createView(),
            'nam' => $race->getRaceid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1',
        ]);
    }

    /**
     * @Route("/{raceid}/delete", name="races_delete", methods={"DELETE","GET","POST"})
     */
    public function delete(Request $request, Races $race): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$race->getRaceid(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($race);
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
        return $this->render('races/_delete_form.html.twig', [
            'race' => $race,
        ]);
    }
}
