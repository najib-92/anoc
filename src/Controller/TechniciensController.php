<?php

namespace App\Controller;

use App\Entity\Techniciens;
use App\Form\TechniciensType;
use Symfony\Component\HttpFoundation\Request;
use Omines\DataTablesBundle\Column\TextColumn;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/techniciens")
 */
class TechniciensController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="techniciens_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        return $this->render('techniciens/index.html.twig');
    }
    /**
     * @Route("/datatable", name="techniciens_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $table = $this->createDataTable()
            ->add('technicienid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('personnelid',TextColumn::class,['label' => 'CIN','data' => function($v,$o){
                return "ff";//is_null($v->getPersonnelid())?"":$v->getPersonnelid()->getNumcin();
            }, 'className' => 'bold'])
            /*->add('groupementid',TextColumn::class,['label' => 'Groupement','data' => function($v,$o){
                return is_null($v->getGroupementid())?"":$v->getGroupementid()->getNomgroupementfr();
            }, 'className' => 'bold'])*/
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Techniciens::class,
            ])
            ->handleRequest($request);

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
     * @Route("/new", name="techniciens_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $technicien = new Techniciens();
        $form = $this->createForm(TechniciensType::class, $technicien);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($technicien);
                $entityManager->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le technicien a été ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Ce technicien existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('techniciens/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{technicienid}", name="techniciens_show", methods={"GET"})
     */
    public function show(Techniciens $technicien): Response
    {
        return $this->render('techniciens/show.html.twig', [
            'technicien' => $technicien,
        ]);
    }

    /**
     * @Route("/{technicienid}/edit", name="techniciens_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Techniciens $technicien): Response
    {
        $form = $this->createForm(TechniciensType::class, $technicien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $this->getDoctrine()->getManager()->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le technicien a été modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('techniciens/_form.html.twig', [
            'technicien' => $technicien,
            'form' => $form->createView(),
            'nam' => $technicien->getTechnicienid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1'
        ]);
    }

    /**
     * @Route("/{technicienid}", name="techniciens_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Techniciens $technicien): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$technicien->getTechnicienid(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($technicien);
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
        return $this->render('techniciens/_delete_form.html.twig', [
            'technicien' => $technicien,
        ]);
    }
}
