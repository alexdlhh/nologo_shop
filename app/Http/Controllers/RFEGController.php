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
use App\Http\Repository\EmployeeRepository;
use App\Http\Repository\GeneralRepository;

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
        $employeeRepository = new EmployeeRepository();  
        $generalRepository = new GeneralRepository();
        $rfegTitleRepository = new RFEGTitleRepository();
        $rfeg_title = $rfegTitleRepository->getbyType('rfeg');      
        $general = $generalRepository->getAll();    
        $content_tables = [];
        foreach($rfeg_title as $title){
            $content_tables[$title->getId()] = $employeeRepository->getbyRfegTitle($title->getId());
        }  
        $news = $newRepository->getNews(5);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $rfeg_title='';
        $content_tables = [];
        if($menu1 == 'gobierno'){
            $rfeg_title = $this->rfegTitleRepository->getbyType($menu1);            
            foreach($rfeg_title as $title){
                $content_tables[$title->getId()] = $this->table2Repository->getbyRfegTitle($title->getId());
            }
            $table = 2;            
        }
        if($menu1 != 'gobierno'){
            $rfeg_title = $this->rfegTitleRepository->getbyType($menu1); 
            foreach($rfeg_title as $title){
                $content_tables[$title->getId()] = $this->table1Repository->getbyRfegTitle($title->getId());
            }
            if($menu1 == 'normativa'){
                $rfeg_title = $this->rfegTitleRepository->getbyType($menu2);                
            }
            if($menu1 == 'rfeg'){
                foreach($rfeg_title as $title){
                    $content_tables[$title->getId()] = $employeeRepository->getbyRfegTitle($title->getId());
                }
            }
            $table = 1;            
        }

        $front = [
            'headers' => $headers,
            'section' => '/rfeg',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'rfeg_title' => $rfeg_title,
            'content_tables' => $content_tables,
            'general' => $general,
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
        $content_tables = [];
        if($seccion == 'gobierno'){
            $rfeg_title = $this->rfegTitleRepository->getbyType($seccion);            
            foreach($rfeg_title as $title){
                $content_tables[$title->getId()] = $this->table2Repository->getbyRfegTitle($title->getId());
            }
            $table = 2;            
        }
        if($seccion != 'gobierno'){
            $rfeg_title = $this->rfegTitleRepository->getbyType($seccion); 
            foreach($rfeg_title as $title){
                $content_tables[$title->getId()] = $this->table1Repository->getbyRfegTitle($title->getId());
            }
            if($seccion == 'normativa'){
                $rfeg_title = $this->rfegTitleRepository->getbyType($subseccion);                
            }
            $table = 1;            
        }

        $table_content = []; //array de objetos 
        return view('admin.rfeg.list', [
            'admin'=>[
                'title'=>'RFEG',
                'section' => 'rfeg',
                'subsection' => 'adminrfef',
                'table' => $table,
                'seccion' => $seccion,
                'subseccion' => $subseccion,
                'rfeg_title' => $rfeg_title,
                'content_tables' => $content_tables,
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
        $file_url = '';
        if($request->hasFile('download_pdf')){
            $file = $request->file('download_pdf');
            $file_name = time().$file->getClientOriginalName();
            $destinationPath = public_path('/files/rfeg/');
            $file->move($destinationPath, $file_name);
            $file_url = '/files/rfeg/'.$file_name;
        }
        $rfegTable1 = $this->table1Repository->save($request->all(), $file_url);
        return response()->json($rfegTable1);
    }

    /**
     * Esta función permitirá actualizar un rfeg_table1
     * @param Request $request
     * @return type
     */
    public function updateRFEGTable1(Request $request){
        $file_url = '';
        if($request->hasFile('download_pdf')){
            $file = $request->file('download_pdf');
            $file_name = time().$file->getClientOriginalName();
            $destinationPath = public_path('/files/rfeg/');
            $file->move($destinationPath, $file_name);
            $file_url = '/files/rfeg/'.$file_name;
        }
        $rfegTable1 = $this->table1Repository->save($request->all(), $file_url);
        return response()->json($rfegTable1);
    }

    /**
     * Esta función permitirá eliminar un rfeg_table1
     * @param Request $request
     * @return type
     */
    public function deleteRFEGTable1($id){
        $rfegTable1 = $this->table1Repository->delete($id);
        return response()->json($rfegTable1);
    }

    /**
     * Esta función permitirá crear un rfeg_table2
     * @param Request $request
     * @return type
     */
    public function createRFEGTable2(Request $request){
        $rfegTable2 = $this->table2Repository->save($request->all());
        return response()->json($rfegTable2);
    }

    /**
     * Esta función permitirá actualizar un rfeg_table2
     * @param Request $request
     * @return type
     */
    public function updateRFEGTable2(Request $request){
        $rfegTable2 = $this->table2Repository->save($request->all());
        return response()->json($rfegTable2);
    }

    /**
     * Esta función permitirá eliminar un rfeg_table2
     * @param Request $request
     * @return type
     */
    public function deleteRFEGTable2($id){
        $rfegTable2 = $this->table2Repository->delete($id);
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