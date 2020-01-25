<?php

namespace App\Controller;

use App\Entity\Douars;
use App\Form\DouarsType;
use Symfony\Component\HttpFoundation\Request;
use Omines\DataTablesBundle\Column\TextColumn;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * @Route("/douars")
 */
class DouarsController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="douars_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        return $this->render('douars/index.html.twig');
    }
    /**
     * @Route("/datatable", name="douars_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $table = $this->createDataTable()
            ->add('douarid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('douarfr',TextColumn::class,['label' => 'Douar en français', 'className' => 'bold'])
            ->add('douarar',TextColumn::class,['label' => 'إسم الدوار', 'className' => 'bold text_Arb_Datatable'])
            ->add('secteurid',TextColumn::class,['label' => 'Nom de secteur','data' => function($v,$o){
                return is_null($v->getSecteurid())?"":$v->getSecteurid()->getSecteurfr();
            }, 'className' => 'bold'])
            ->add('provinceid', TextColumn::class,['label' => 'Nom de province','data' => function($v,$o){
                return is_null($v->getProvinceid())?"":$v->getProvinceid()->getProvincefr();
            }, 'className' => 'bold'])
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Douars::class,
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
     * @Route("/new", name="douars_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $douar = new Douars();
        $form = $this->createForm(DouarsType::class, $douar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($douar);
                $entityManager->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le douar a été ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Ce nom de douar existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('douars/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{douarid}", name="douars_show", methods={"GET"})
     */
    public function show(Douars $douar): Response
    {
        return $this->render('douars/show.html.twig', [
            'douar' => $douar,
        ]);
    }

    /**
     * @Route("/{douarid}/edit", name="douars_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Douars $douar): Response
    {
        $form = $this->createForm(DouarsType::class, $douar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $this->getDoctrine()->getManager()->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le douar a été modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('douars/_form.html.twig', [
            'douar' => $douar,
            'form' => $form->createView(),
            'nam' => $douar->getDouarid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1'
        ]);
    }

    /**
     * @Route("/{douarid}/delete", name="douars_delete", methods={"DELETE","GET","POST"})
     */
    public function delete(Request $request, Douars $douar): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$douar->getDouarid(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($douar);
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
        return $this->render('douars/_delete_form.html.twig', [
            'douar' => $douar,
        ]);
        
    }
}
