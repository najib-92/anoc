<?php

namespace App\Controller;

use App\Entity\Affectationtechnicien;
use App\Form\AffectationtechnicienType;
use Omines\DataTablesBundle\Column\DateTimeColumn;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use function Sodium\add;

/**
 * @Route("/affectationtechnicien")
 */
class AffectationtechnicienController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="affectationtechnicien_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('affectationtechnicien/index.html.twig');
    }
    /**
     * @Route("/datatable", name="affectationtechnicien_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $table = $this->createDataTable()
            ->add('affectationtechnicienid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add("groupementid",TextColumn::class,['label' => 'Nom de groupement','data' => function($v,$o){
                return is_null($v->getGroupementid())?"":$v->getGroupementid()->getNomgroupementfr();
            }, 'className' => 'bold'])
            ->add("technicienid",TextColumn::class,['label' => 'Nom de technicien','data' => function($v,$o){
                return is_null($v->getTechnicienid())?"":$v->getTechnicienid()->getNumcinNomfrPrenomfrTechnicien();
            }, 'className' => 'bold'])
            ->add('datedebutaffectation', DateTimeColumn::class,['label' => 'Date debut d\'affectation', 'format' => 'd-m-Y', 'className' => 'bold'])
            ->add('datefinaffectation', DateTimeColumn::class,['label' => 'Date fin d\'affectation', 'format' => 'd-m-Y', 'className' => 'bold'])
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Affectationtechnicien::class,
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
     * @Route("/new", name="affectationtechnicien_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $affectationtechnicien = new Affectationtechnicien();
        $form = $this->createForm(AffectationtechnicienType::class, $affectationtechnicien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($affectationtechnicien);
            $entityManager->flush();

            return $this->redirectToRoute('affectationtechnicien_index');
        }

        return $this->render('affectationtechnicien/new.html.twig', [
            'affectationtechnicien' => $affectationtechnicien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{affectationtechnicienid}", name="affectationtechnicien_show", methods={"GET"})
     */
    public function show(Affectationtechnicien $affectationtechnicien): Response
    {
        return $this->render('affectationtechnicien/show.html.twig', [
            'affectationtechnicien' => $affectationtechnicien,
        ]);
    }

    /**
     * @Route("/{affectationtechnicienid}/edit", name="affectationtechnicien_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Affectationtechnicien $affectationtechnicien): Response
    {
        $form = $this->createForm(AffectationtechnicienType::class, $affectationtechnicien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('affectationtechnicien_index');
        }

        return $this->render('affectationtechnicien/edit.html.twig', [
            'affectationtechnicien' => $affectationtechnicien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{affectationtechnicienid}", name="affectationtechnicien_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Affectationtechnicien $affectationtechnicien): Response
    {
        if ($this->isCsrfTokenValid('delete'.$affectationtechnicien->getAffectationtechnicienid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($affectationtechnicien);
            $entityManager->flush();
        }

        return $this->redirectToRoute('affectationtechnicien_index');
    }
}
