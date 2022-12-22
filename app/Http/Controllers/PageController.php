<?php
namespace App\Http\Controllers;

use App\Http\Mapper\PagesMapper;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\GeneralRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var PagesRepository
     */
    private $pagesRepository;

    /**
     * PagesController constructor.
     * @param PagesRepository $pagesRepository
     */
    public function __construct(PagesRepository $pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getAll(Request $request)
    {
        $page = $request->get('page');
        $search = $request->get('search');
        $pages = $this->pagesRepository->getAll();
        return view('admin.pages.list', ['admin'=>['title'=>'Albums','pages'=>$pages,'section' => 'page','subsection' => 'listpage']]);
    }

    /**
     * @return View
     */
    public function edit(Request $request){
        $id = $request->get('id');
        $pages = $this->pagesRepository->getOne(['id' => $id]);
        return view('admin.pages.edit', ['admin'=>['title'=>'Albums','pages'=>$pages,'section' => 'page','subsection' => 'listpage']]);
    }
    /**
     * @return View
     */
    public function create(Request $request){
        $pages = $this->pagesRepository->create($request);
        return view('admin.pages.create', ['admin'=>['title'=>'Albums','pages'=>$pages,'section' => 'page','subsection' => 'savepage']]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne(Request $request)
    {
        $id = $request->get('id');
        $pages = $this->pagesRepository->getOne(['id' => $id]);
        return response()->json($pages);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $id = $this->pagesRepository->update($request);
        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        $id = $this->pagesRepository->savePage($request);
        return response()->json(['id' => $id]);
    }

    public function adminPage($search=''){
        $pages = $this->pagesRepository->getAllPages();
        return view('admin.pages.list', ['admin'=>[
            'title'=>'Albums',
            'pages'=>$pages,
            'search'=>$search,
            'section' => 'estaticas',
            'subsection' => 'listestaticas']]);
    }

    public function adminPageEdit($id){
        $pages = $this->pagesRepository->getOnePage($id)[0];
        return view('admin.pages.edit', ['admin'=>[
            'title'=>'Albums',
            'pages'=>$pages,
            'id'=>$id,
            'section' => 'estaticas',
            'subsection' => 'listestaicas']]);
    }

    public function adminGeneral(){
        $pages = $this->pagesRepository->getGeneralAdmin();
        return view('admin.pages.general', ['admin'=>[
            'title'=>'Albums',
            'pages'=>$pages,
            'id'=>1,
            'section' => 'general',
            'subsection' => 'listgeneral']]);
    }

    public function saveGeneral(Request $request){
        if($request->input('type')=='img'){
            $file = $request->file('meta_value');
            $name = date('Ymdhis').'_'.$file->getClientOriginalName();
            $file->move(public_path().'/general/', $name);
            $meta_value = '/general/'.$name;
        }else{
            $meta_value = $request->input('meta_value');
        }
        $id = $this->pagesRepository->saveGeneral($request,$meta_value);
        return response()->json(['id' => $id]);
    }

    public function frontPage($alias){
        $RSRepository = new RSRepository();
        $generalRepository = new GeneralRepository();
        $pages = $this->pagesRepository->getStaticBySlug($alias);
        $headers = $this->header_order($this->pagesRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $general = $generalRepository->getConfigGeneral();
        
        return view('static', ['front'=>[
            'title'=>'Albums',
            'page'=>$pages[0],
            'headers' => $headers,
            'general' => $general,
            'rs' => $rs,
            'section' => 'estaticas',
            'subsection' => 'listestaicas']]);
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
}