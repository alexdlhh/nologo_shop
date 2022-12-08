<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\CategoryNewRepository;
use App\Http\Repository\TagNewRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;
use App\Http\Repository\AlbumNewRepository;
use App\Http\Repository\BannerRepository;
use App\Http\Repository\Table1Repository;
use App\Http\Repository\Table2Repository;
use App\Http\Repository\RFEGTitleRepository;

class RFEGController extends Controller
{
    protected $pagesRepository;
    protected $newsRepository;
    protected $categoryNewRepository;
    protected $tagNewRepository;
    protected $rsRepository;
    protected $sponsorRepository;
    protected $albumNewRepository;
    protected $bannerRepository;
    protected $table1Repository;
    protected $table2Repository;
    protected $rfegTitleRepository;

    public function __construct(PagesRepository $pagesRepository, NewsRepository $newsRepository, CategoryNewRepository $categoryNewRepository, TagNewRepository $tagNewRepository, RSRepository $rsRepository, SponsorRepository $sponsorRepository, AlbumNewRepository $albumNewRepository, BannerRepository $bannerRepository, Table1Repository $table1Repository, Table2Repository $table2Repository, RFEGTitleRepository $rfegTitleRepository)
    {
        $this->pagesRepository = $pagesRepository;
        $this->newsRepository = $newsRepository;
        $this->categoryNewRepository = $categoryNewRepository;
        $this->tagNewRepository = $tagNewRepository;
        $this->rsRepository = $rsRepository;
        $this->sponsorRepository = $sponsorRepository;
        $this->albumNewRepository = $albumNewRepository;
        $this->bannerRepository = $bannerRepository;
        $this->table1Repository = $table1Repository;
        $this->table2Repository = $table2Repository;
        $this->rfegTitleRepository = $rfegTitleRepository;
    }

    public function frontPage($menu1='rfeg',$menu2='rfeg')
    {
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();        
        $news = $newRepository->getNews(5);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        

        $front = [
            'headers' => $headers,
            'section' => '/rfeg',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'RFEG',
            'title'=>'RFEG',
            'menu1' => $menu1,
            'menu2' => $menu2,
        ];
        return view('pages.rfeg')->with('front',$front);
    }

    public function header_order($headers){
        $order = [];
        $aux = [];
        foreach($headers as $_link){
            $order[$_link->getOrder()] = $_link;
        }
        for($i = 1; $i <= count($order); $i++){
            $aux[] = $order[$i];
        }
        return $aux;
    }
    //desde aqui vamos a seleccionjar a que seccion vamos a ir
    public function adminRFEG(){

        return view('admin.rfeg.section', [
            'admin'=>[
                'title'=>'RFEG',
                'section' => 'rfeg',
                'subsection' => 'adminrfef'
                ]]);
    
    }

    public function adminRFEGSection($seccion='', $subseccion=""){        
        $table = '';
        $rfeg_title='';
        
        if($seccion == 'gobierno'){
            $rfeg_title = $this->rfegTitleRepository->getbyType($seccion);
            $table = 2;            
        }
        if($seccion != 'gobierno'){
            $table = 1;
            if($seccion == 'normativa'){
                $rfeg_title = $this->rfegTitleRepository->getbyType($subseccion);
            }
        }

        $table_content = []; //array de objetos 
        return view('admin.rfeg.list', [
            'admin'=>[
                'title'=>'RFEG',
                'section' => 'rfeg',
                'subsection' => 'adminrfef',
                'table' => $table,
                'seccion' => $seccion,
                'rfeg_title' => $rfeg_title,
                ]]);
    }

    public function adminRFEGEdit($id){
        $table = '';
        $table_content = []; //array de objetos 
        return view('admin.rfeg.edit', [
            'admin'=>[
                'title'=>'RFEG',
                'section' => 'rfeg',
                'subsection' => 'adminrfef',
                'table' => $table,
                'rfeg_section' => $seccion,
                ]]);
    }

    /**
     * Esta función permitirá creat un rfeg_title
     * @param Request $request
     * @return type
     */
    public function createRFEGTitle(Request $request){
        $rfegTitle = $this->rfegTitleRepository->save($request->all());
        return response()->json($rfegTitle);
    }


    /**
     * Esta función permitirá actualizar un rfeg_title
     * @param Request $request
     * @return type
     */
    public function updateRFEGTitle(Request $request){
        $rfegTitle = $this->rfegTitleRepository->save($request->all());
        return response()->json($rfegTitle);
    }

    /**
     * Esta función permitirá eliminar un rfeg_title
     * @param Request $request
     * @return type
     */
    public function deleteRFEGTitle($id){
        $rfegTitle = $this->rfegTitleRepository->delete($id);
        return response()->json($rfegTitle);
    }

    /**
     * Esta función permitirá crear un rfeg_table1
     * @param Request $request
     * @return type
     */
    public function createRFEGTable1(Request $request){
        $rfegTable1 = $this->table1Repository->create($request->all());
        return response()->json($rfegTable1);
    }

    /**
     * Esta función permitirá actualizar un rfeg_table1
     * @param Request $request
     * @return type
     */
    public function updateRFEGTable1(Request $request){
        $rfegTable1 = $this->table1Repository->update($request->all());
        return response()->json($rfegTable1);
    }

    /**
     * Esta función permitirá eliminar un rfeg_table1
     * @param Request $request
     * @return type
     */
    public function deleteRFEGTable1(Request $request){
        $rfegTable1 = $this->table1Repository->delete($request->all());
        return response()->json($rfegTable1);
    }

    /**
     * Esta función permitirá crear un rfeg_table2
     * @param Request $request
     * @return type
     */
    public function createRFEGTable2(Request $request){
        $rfegTable2 = $this->table2Repository->create($request->all());
        return response()->json($rfegTable2);
    }

    /**
     * Esta función permitirá actualizar un rfeg_table2
     * @param Request $request
     * @return type
     */
    public function updateRFEGTable2(Request $request){
        $rfegTable2 = $this->table2Repository->update($request->all());
        return response()->json($rfegTable2);
    }

    /**
     * Esta función permitirá eliminar un rfeg_table2
     * @param Request $request
     * @return type
     */
    public function deleteRFEGTable2(Request $request){
        $rfegTable2 = $this->table2Repository->delete($request->all());
        return response()->json($rfegTable2);
    }

    /**
     * Esta función permite reordena los elementos de una tabla
     * @param Request $request
     */
    public function orderRFEGTable(Request $request){
        $table = $request->input('table');
        $order = $request->input('order');
        $this->rfegTitleRepository->order($table, $order);
    }
}