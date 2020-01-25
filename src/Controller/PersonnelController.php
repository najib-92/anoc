<?php

namespace App\Controller;

use App\Entity\Personnel;
use App\Form\PersonnelType;
use Symfony\Component\HttpFoundation\Request;
use Omines\DataTablesBundle\Column\TextColumn;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Column\DateTimeColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/personnel")
 */
class PersonnelController extends Controller
{
    use DataTablesTrait;
    /**
     * @Route("/", name="personnel_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        return $this->render('personnel/index.html.twig');
    }
    /**
     * @Route("/datatable", name="personnel_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $table = $this->createDataTable()
            ->add('personnelid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('matricule',TextColumn::class,['label' => 'Matricule', 'className' => 'bold'])
            ->add('numcin',TextColumn::class,['label' => 'CIN', 'className' => 'bold'])
            ->add('datecin', DateTimeColumn ::class,['label' => 'Date CIN', 'format' => 'd-m-Y', 'className' => 'bold'])
            ->add('validitecin', DateTimeColumn::class,['label' => 'Validation CIN', 'format' => 'd-m-Y', 'className' => 'bold'])
            ->add('nomfr', TextColumn::class,['label' => 'Nom en français', 'className' => 'bold'])
            ->add('nomar', TextColumn::class,['label' => 'الإسم العائلي', 'className' => 'bold text_Arb_Datatable'])
            ->add('prenomfr', TextColumn::class,['label' => 'Prenom en français', 'className' => 'bold'])
            ->add('prenomar', TextColumn::class,['label' => 'الإسم الشخصي', 'className' => 'bold text_Arb_Datatable'])
            ->add('adressefr', TextColumn::class,['label' => 'Adresse en français', 'className' => 'bold'])
            ->add('adressear', TextColumn::class,['label' => 'Adresse en arabe', 'className' => 'bold'])
            ->add('sexe', TextColumn::class,['label' => 'sexe', 'className' => 'bold'])
            ->add('datenaissance', DateTimeColumn::class,['label' => 'Date Naissance', 'format' => 'd-m-Y', 'className' => 'bold'])
            ->add('lieunaissance', TextColumn::class,['label' => 'Lieu Naissance', 'className' => 'bold'])
            ->add('numcnss', TextColumn::class,['label' => 'Numéro CNSS', 'className' => 'bold'])
            ->add('numcimr', TextColumn::class,['label' => 'Numéro CIMR', 'className' => 'bold'])
            ->add('telpersonnel', TextColumn::class,['label' => 'Tel personnel', 'className' => 'bold'])
            ->add('telprofessionnel', TextColumn::class,['label' => 'Tel professionnel', 'className' => 'bold'])
            ->add('emailpersonnel', TextColumn::class,['label' => 'Email personnel', 'className' => 'bold'])
            ->add('emailprofessionnel', TextColumn::class,['label' => 'Email professionnel', 'className' => 'bold'])
            ->add('typecontrat', TextColumn::class,['label' => 'Type contrat', 'className' => 'bold'])
            ->add('fonction', TextColumn::class,['label' => 'Fonction', 'className' => 'bold'])
            ->add('affectation', TextColumn::class,['label' => 'Affectation', 'className' => 'bold'])
            ->add('dateentree', DateTimeColumn::class,['label' => 'Date entrée','format' => 'd-m-Y', 'className' => 'bold'])
            ->add('situationfamiliale', TextColumn::class,['label' => 'Situation familiale', 'className' => 'bold'])
            ->add('salaire', TextColumn::class,['label' => 'salaire', 'className' => 'bold'])
            ->add('banque', TextColumn::class,['label' => 'Banque', 'className' => 'bold'])
            ->add('numrib', TextColumn::class,['label' => 'Numéro du RIB', 'className' => 'bold'])
            ->add('diplomes', TextColumn::class,['label' => 'Diplôme', 'className' => 'bold'])
            ->add('dateobtdiplome', DateTimeColumn::class,['label' => 'Date diplôme','format' => 'd-m-Y', 'className' => 'bold'])
            ->add('specialite', TextColumn::class,['label' => 'spécialité', 'className' => 'bold'])
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Personnel::class,
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
     * @Route("/new", name="personnel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $personnel = new Personnel();
        $form = $this->createForm(PersonnelType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($personnel);
                $entityManager->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Personnel ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Cette personne existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('personnel/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{personnelid}", name="personnel_show", methods={"GET"})
     */
    public function show(Personnel $personnel): Response
    {
        return $this->render('personnel/show.html.twig', [
            'personnel' => $personnel,
        ]);
    }

    /**
     * @Route("/{personnelid}/edit", name="personnel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Personnel $personnel): Response
    {
        $form = $this->createForm(PersonnelType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $this->getDoctrine()->getManager()->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Les informations de la personne en modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('personnel/_form.html.twig', [
            'personnel' => $personnel,
            'form' => $form->createView(),
            'nam' => $personnel->getPersonnelid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1'
        ]);
    }

    /**
     * @Route("/{personnelid}/delete", name="personnel_delete", methods={"DELETE","GET","POST"})
     */
    public function delete(Request $request, Personnel $personnel): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$personnel->getPersonnelid(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($personnel);
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
        return $this->render('personnel/_delete_form.html.twig', [
            'personnel' => $personnel
        ]);
        
    }
}
