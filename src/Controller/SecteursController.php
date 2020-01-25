<?php

namespace App\Controller;

use App\Entity\Secteurs;
use App\Form\SecteursType;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/secteurs")
 */
class SecteursController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="secteurs_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
            return $this->render('secteurs/index.html.twig');
    }
    /**
     * @Route("/datatable", name="secteurs_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $table = $this->createDataTable()
            ->add('secteurid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('secteurfr', TextColumn::class,['label' => 'Nom en français', 'className' => 'bold'])
            ->add('secteurar',TextColumn::class,['label' => 'إسم المنطقة', 'className' => 'bold text_Arb_Datatable'])
            ->add("codesecteur",TextColumn::class,['label' => 'Code Secteur', 'className' => 'bold'])
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Secteurs::class,
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
     * @Route("/new", name="secteurs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $secteur = new Secteurs();
        $form = $this->createForm(SecteursType::class, $secteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($secteur);
                $entityManager->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le secteur a été ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Ce code de secteur existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('secteurs/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{secteurid}", name="secteurs_show", methods={"GET"})
     */
    public function show(Secteurs $secteur): Response
    {
        return $this->render('secteurs/show.html.twig', [
            'secteur' => $secteur,
        ]);
    }

    /**
     * @Route("/{secteurid}/edit", name="secteurs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Secteurs $secteur): Response
    {
        $form = $this->createForm(SecteursType::class, $secteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $this->getDoctrine()->getManager()->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le secteur a été modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('secteurs/_form.html.twig', [
            'secteur' => $secteur,
            'form' => $form->createView(),
            'nam' => $secteur->getSecteurid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1'
        ]);
    }

    /**
     * @Route("/{secteurid}/delete", name="secteurs_delete", methods={"DELETE","GET","POST"})
     */
    public function delete(Request $request, Secteurs $secteur): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$secteur->getSecteurid(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($secteur);
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
        return $this->render('secteurs/_delete_form.html.twig', [
            'secteur' => $secteur,
        ]);
    }
}
