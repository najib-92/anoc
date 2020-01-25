<?php

namespace App\Controller;

use App\Entity\Communes;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\MapColumn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Exception\CacheException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use function Sodium\add;


class DatatableController extends Controller
{

    use DataTablesTrait;
    /**
     * @Route("/datatable", name="datatable")
     */
    public function index(Request $request)
    {
        $request->request->set("_dt","dt");
        $columns = $request->get("columns");
        $keys =  $request->get("keys");
        $t = $request->get("t");
        // only for this situation when the action button is static and last children of thead > tr >
        //array_pop($columns);
       // $request->request->set("columns",$columns);
        $table = $this->createDataTable();
        $bl = true;
        foreach ($columns as $column) {
            if($keys!=null)
            foreach ($keys as $key => $value){
                if ($column["name"] == $key) {
                    $table->add($column["name"], TextColumn::class, ["data"=>function($v,$o) use ($keys, $columns) {
                        foreach ($columns as $column)
                            foreach ($keys as $key => $value)
                                if ($column["name"] == $key)
                                    return  !is_null($v->{"get".ucfirst($key)}())?
                                        $v->{"get".ucfirst($key)}()->{"get".ucfirst(strtolower($value))}()
                                        :"";

                    }]);
                    $bl = false;
                    break;
                }
                $bl=true;
            }
            if($bl)
                $table->add($column["name"], TextColumn::class);

        }

        $table->createAdapter(ORMAdapter::class, [
            'entity' => "App\Entity\\".$request->get("datatableName")
        ]);
           $table->handleRequest($request);
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
}
