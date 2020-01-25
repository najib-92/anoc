<?php

namespace App\Controller;

use App\Entity\Provinces;
use App\Form\ProvincesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use function Sodium\add;

/**
 * @Route("/provinces")
 */
class ProvincesController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="provinces_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        return $this->render('provinces/index.html.twig');
    }
    /**
     * @Route("/datatable", name="provinces_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $table = $this->createDataTable()
            ->add('provinceid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('provincefr', TextColumn::class,['label' => 'Nom', 'className' => 'bold'])
            ->add('provincear',TextColumn::class,['label' => 'إسم الجهة', 'className' => 'bold text_Arb_Datatable'])
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Provinces::class,
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
     * @Route("/new", name="provinces_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $province = new Provinces();
        $form = $this->createForm(ProvincesType::class, $province);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($province);
                $entityManager->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le provinces a été ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Ce nom de provinces existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('provinces/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{provinceid}", name="provinces_show", methods={"GET"})
     */
    public function show(Provinces $province): Response
    {
        return $this->render('provinces/show.html.twig', [
            'province' => $province,
        ]);
    }

    /**
     * @Route("/{provinceid}/edit", name="provinces_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Provinces $province): Response
    {
        $form = $this->createForm(ProvincesType::class, $province);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $this->getDoctrine()->getManager()->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le provinces a été modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('provinces/_form.html.twig', [
            'province' => $province,
            'form' => $form->createView(),
            'nam' => $province->getProvinceid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1',
        ]);
    }

    /**
     * @Route("/{provinceid}/delete", name="provinces_delete", methods={"DELETE","GET","POST"})
     */
    public function delete(Request $request, Provinces $province): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$province->getProvinceid(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($province);
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
        return $this->render('provinces/_delete_form.html.twig', [
            'province' => $province,
        ]);
    }
}
