<?php

namespace App\Controller;

use App\Entity\Groupements;
use App\Form\GroupementsType;
use Doctrine\ORM\QueryBuilder;
use Omines\DataTablesBundle\Adapter\Doctrine\ORM\SearchCriteriaProvider;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Omines\DataTablesBundle\Column\TextColumn;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Column\DateTimeColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\ORM\EntityRepository;


/**
 * @Route("/groupements")
 */
class GroupementsController extends Controller
{

    use DataTablesTrait;
    /**
     * @Route("/", name="groupements_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        return $this->render('groupements/index.html.twig');
    }
    /**
     * @Route("/datatable", name="groupements_datatable", methods={"GET","POST"})
     */
    public function datatable(Request $request): Response
    {
        $request->request->set("_dt","dt");
        $requestData = filter_var_array($_REQUEST);
        $search1=$requestData["search"]["value"];
        $request->request->set("search",["value"=>"","regex"=>"false"]);
        $table = $this->createDataTable()
            ->add('groupementid', TextColumn::class,['label' => 'ID', 'className' => 'bold hideID'])
            ->add('kkk',TextColumn::class,['label' => 'Nom de secteur','data' => function($v,$o){
                return is_null($v->getSecteurid())?"":$v->getSecteurid()->getSecteurfr();
            }, 'className' => 'bold'])
            ->add('technicienid',TextColumn::class,['label' => 'Technicien','data' => function($v,$o){
                return is_null($v->getTechnicienid())?"":$v->getTechnicienid()->getNumcinNomfrPrenomfrTechnicien();
            }, 'className' => 'bold'])
            //->add('groupementmereid',TextColumn::class,['label' => 'Groupement mere ID', 'className' => 'bold'])
            ->add('codegroupement',TextColumn::class,['label' => 'Code de groupement', 'className' => 'bold'])
            ->add('nomgroupementfr',TextColumn::class,['label' => 'Nom en français', 'className' => 'bold'])
            ->add('nomgroupementar',TextColumn::class,['label' => 'إسم التجمع', 'className' => 'bold text_Arb_Datatable'])
            ->add('adressepostale',TextColumn::class,['label' => 'Adresse postale', 'className' => 'bold'])
            ->add('datecreation',DateTimeColumn::class,['label' => 'Date de creation', 'format' => 'd-m-Y', 'className' => 'bold'])
            ->add('pvcreation',TextColumn::class,['label' => 'PV creation', 'className' => 'bold', 'render' => function($value, $context) {
                $nameFile = sprintf('%s',$value);
                return sprintf('<a href="../uploads/groupementsPVCreation/'.basename($nameFile).'" target="_blank">PV Creation</a>', $value, $value);
            }])
            ->add('typetauxfonctionnement',TextColumn::class,['label' => 'type Taux fonctionnement', 'className' => 'bold', 'render' => function($value, $context) {
                $typeTauxFonct = sprintf('%s',$value);
                return sprintf(($typeTauxFonct=='paye par groupement')?'Le même pours toutes les races':'Diffère d\'une race à l\'autre', $value, $value);
            }])
            ->add('droitfonctionement',TextColumn::class,['label' => 'Droit fonctionement', 'className' => 'bold'])
            ->add('autrecotisations',TextColumn::class,['label' => 'Autre cotisations', 'className' => 'bold'])
            ->add('effectifovinencadre',TextColumn::class,['label' => 'Effectif ovin encadre', 'className' => 'bold'])
            ->add('effectifcaprinencadre',TextColumn::class,['label' => 'Effectif caprin encadre', 'className' => 'bold'])
            ->add('lieupvcreation',TextColumn::class,['label' => 'Lieu PV creation', 'className' => 'bold'])
            ->add('datepvcreation',DateTimeColumn::class,['label' => 'Date PV creation', 'format' => 'd-m-Y', 'className' => 'bold']);
            //->add("action",TextColumn::class, ['label' => 'Action', 'className' => 'bold', 'render' => '<button class="btn btn-warning btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalEdit" data-toggle="modal" data-target="#successmodal">Modifier</button><button type="button" class="btn btn-danger btn-sm btn-round waves-effect waves-light ml-1 mr-1 btnModalDelete" data-toggle="modal" data-target="#successmodal">Supprimer</button>', 'raw' => true])
            if($search1!=""){
                $search2=substr_replace($search1,"%",0,0);
                $s=substr_replace($search2,"%",strlen($search2));
                $table
                ->createAdapter(ORMAdapter::class, [
                    'entity' => Groupements::class,
                    'query' => function (QueryBuilder $builder) use ($s){
                        $builder
                            ->select('g')
                            ->addSelect('s')
                            ->addSelect('t')
                            ->addSelect('p')
                            ->from(Groupements::class, 'g')
                            ->innerJoin('g.secteurid', 's', 'g.secteurid = s.secteurid')
                            ->innerJoin('g.technicienid', 't', 'g.technicienid = t.technicienid')
                            ->innerJoin('t.personnelid', 'p', 't.personnelid = p.personnelid')
                            ->where('s.secteurfr  like :secteurfr or p.nomfr like :nomfr or p.prenomfr like :prenomfr or p.numcin like :numcin or g.codegroupement like :codegroupement or g.nomgroupementfr like :nomgroupementfr or g.nomgroupementar like :nomgroupementar or g.adressepostale like :adressepostale or g.datecreation like :datecreation or g.pvcreation like :pvcreation or g.typetauxfonctionnement like :typetauxfonctionnement or g.droitfonctionement like :droitfonctionement or g.autrecotisations like :autrecotisations or g.effectifovinencadre like :effectifovinencadre or g.effectifcaprinencadre like :effectifcaprinencadre or g.lieupvcreation like :lieupvcreation or g.datepvcreation like :datepvcreation')
                            ->setParameters(array(':secteurfr'=>$s,':nomfr'=>$s,':prenomfr'=>$s,':numcin'=>$s,':codegroupement'=>$s,':nomgroupementfr'=>$s,':nomgroupementar'=>$s,':adressepostale'=>$s,':datecreation'=>$s,':pvcreation'=>$s,':typetauxfonctionnement'=>$s,':droitfonctionement'=>$s,':autrecotisations'=>$s,':effectifovinencadre'=>$s,':effectifcaprinencadre'=>$s,':lieupvcreation'=>$s,':datepvcreation'=>$s,))

                        ;
                    },
                ])
                ->handleRequest($request);
            }else{
                $table
                    ->createAdapter(ORMAdapter::class, [
                        'entity' => Groupements::class,
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
     * @Route("/new", name="groupements_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $groupement = new Groupements();
        $form = $this->createForm(GroupementsType::class, $groupement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                /** @var UploadedFile $PVCreationFile */
                $PVCreationFile = $form['pvcreation']->getData();

                // this condition is needed because the 'brochure' field is not required
                // so the PDF file must be processed only when a file is uploaded
                if ($PVCreationFile) {
                    $originalFilename = pathinfo($PVCreationFile->getClientOriginalName(), PATHINFO_FILENAME);
                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$PVCreationFile->guessExtension();

                    // Move the file to the directory where brochures are stored
                    try {
                        $PVCreationFile->move(
                            $this->getParameter('groupementsPVCreation_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                    }

                    // updates the 'PVCreationFilename' property to store the PDF file name
                    // instead of its contents
                    //$groupement->setPVCreationFilename($newFilename);
                    $groupement->setPvcreation(new File($this->getParameter('groupementsPVCreation_directory').'/'.$newFilename));
                    //$groupement->setPvcreation('../uploads/groupementsPVCreation/'.$newFilename);

                }
                $data = $request->request->all();($data["groupements"]["typetauxfonctionnement"]=="paye par race")?$groupement->setDroitfonctionement(null):$groupement->setDroitfonctionement($data["groupements"]["droitfonctionement"]);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($groupement);
                $entityManager->flush();
                return new Response(json_encode([
                        'code' => 1,
                    'message'=>'Le groupement a été ajouté avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Ce nom de groupement existe déjà dans la base de donnée'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('groupements/_form.html.twig', [
            'form' => $form->createView(),
            'nam' => 'new'
        ]);
    }

    /**
     * @Route("/{groupementid}", name="groupements_show", methods={"GET"})
     */
    public function show(Groupements $groupement): Response
    {
        return $this->render('groupements/show.html.twig', [
            'groupement' => $groupement,
        ]);
    }

    /**
     * @Route("/{groupementid}/edit", name="groupements_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Groupements $groupement): Response
    {
        //fetch current img is exists
        $PVCreationFile=$groupement->getPvcreation();

        if($PVCreationFile !== null) {
            $groupement->setPvcreation($PVCreationFile);
        }
        $form = $this->createForm(GroupementsType::class, $groupement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {          
            try{
                $PVCreationFileEdit = $form['pvcreation']->getData();
                //Check if new image was uploaded
                if($PVCreationFileEdit !== null) {
                    //remove the old file
                    $fs = new Filesystem();
                    $fs->remove([$PVCreationFile]);
                    //uplo new file
                    $originalFilename = pathinfo($PVCreationFileEdit->getClientOriginalName(), PATHINFO_FILENAME);
                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^؀-ۿ A-Za-z0-9_] remove; Lower()', $originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$PVCreationFileEdit->guessExtension();
                    try {
                        $PVCreationFileEdit->move(
                            $this->getParameter('groupementsPVCreation_directory'),
                            $newFilename
                        );
                    }catch (FileException $e) { }
                    $groupement->setPvcreation(new File($this->getParameter('groupementsPVCreation_directory').'/'.$newFilename));
                    //$groupement->setPvcreation('../uploads/groupementsPVCreation/'.$newFilename);
                } else {
                    //Restore old file name
                    $groupement->setPvcreation($PVCreationFile);
                }
                $data = $request->request->all();($data["groupements"]["typetauxfonctionnement"]=="paye par race")?$groupement->setDroitfonctionement(null):$groupement->setDroitfonctionement($data["groupements"]["droitfonctionement"]);
                $this->getDoctrine()->getManager()->flush();
                return new Response(json_encode([
                    'code' => 1,
                    'message'=>'Le groupement a été modifier avec succès'
                ]),Response::HTTP_OK);
            }
            catch(\Exception $e){
                return new Response(json_encode([
                    'code' => 2,
                    'message'=>'Impossible d\'effectuer cette modification'
                ]),Response::HTTP_OK);
            }
        }
        return $this->render('groupements/_form.html.twig', [
            'groupement' => $groupement,
            'form' => $form->createView(),
            'nam' => $groupement->getGroupementid().'/edit',
            'classBtnAddEdit' => 'btn btnAED btn-warning waves-effect waves-light m-1'
        ]);
    }

    /**
     * @Route("/{groupementid}/delete", name="groupements_delete", methods={"DELETE","GET","POST"})
     */
    public function delete(Request $request, Groupements $groupement): Response
    {
        try{
            if ($this->isCsrfTokenValid('delete'.$groupement->getGroupementid(), $request->request->get('_token'))) {
                //remove file
                $PVCreationFile=$groupement->getPvcreation();
                $fs = new Filesystem();
                $fs->remove([$PVCreationFile]);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($groupement);
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
        return $this->render('groupements/_delete_form.html.twig', [
            'groupement' => $groupement,
        ]);
        
    }

}
