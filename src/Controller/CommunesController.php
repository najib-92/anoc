<?php

namespace App\Controller;

use App\Entity\Communes;
use App\Form\CommunesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use function Sodium\add;

/**
 * @Route("/communes")
 */
class CommunesController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="communes_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        return $this->render('communes/index.html.twig');
    }
    /**
     * @Route("/datatable", name="communes_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $table = $this->createDataTable()
            ->add('communeid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('communefr', TextColumn::class,['label' => 'Nom', 'className' => 'bold'])
            ->add('communear',TextColumn::class,['label' => 'إسم الإقليم', 'className' => 'bold text_Arb_Datatable'])
            ->add("villeid",TextColumn::class,['label' => 'Nom de ville','data' => function($v,$o){
                return is_null($v->getVilleid())?"":$v->getVilleid()->getVillefr();
            }, 'className' => 'bold'])
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Communes::class,
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
     * @Route("/new", name="communes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commune = new Communes();
        $form = $this->createForm(CommunesType::class, $commune);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($commune);
                $entityManager->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le commune a été ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'La commune existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('communes/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{communeid}", name="communes_show", methods={"GET"})
     */
    public function show(Communes $commune): Response
    {
        return $this->render('communes/show.html.twig', [
            'commune' => $commune,
        ]);
    }

    /**
     * @Route("/{communeid}/edit", name="communes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Communes $commune): Response
    {
        $form = $this->createForm(CommunesType::class, $commune);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $this->getDoctrine()->getManager()->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le commune a été modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('communes/edit.html.twig', [
            'commune' => $commune,
            'form' => $form->createView(),
            'nam' => $commune->getCommuneid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1',
            
        ]);
    }
    /**
     * @Route("/{communeid}/delete", name="communes_delete", methods={"DELETE","GET","POST"})
     */
    public function delete(Request $request, Communes $commune): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$commune->getCommuneid(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($commune);
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
        return $this->render('communes/_delete_form.html.twig', [
            'commune' => $commune,
        ]);
        
    }
}
