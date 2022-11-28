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
//use App\Http\Helpers\Common;

class NewsController extends Controller
{
    /**
     * Display a listing of News.
     * @return \Illuminate\Http\Response
     */
    public function news_list($page = 1, $status=1, $fecha_search=0, $searchCriteria=''){
        $newsRepository = new NewsRepository();
        $filter = ['page' => $page, 'status' => $status?1:0, 'fecha_search' => $fecha_search, 'searchCriteria' => $searchCriteria];
        $news = $newsRepository->getAll($filter);
        $total_news = $newsRepository->getTotalNews($filter);
        $total_pages = ceil($total_news/10);
        return view('admin.news.list')->with('admin',[
            'title' => 'Listado de Noticias',
            'news' => $news,
            'total_news' => $total_news,
            'total_pages' => $total_pages,
            'filter' => $filter,
            'section' => 'news',
            'subsection' => 'list'
        ]);
    }

    /**
     * Show the form for creating a new News.
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categoryNewRepository = new CategoryNewRepository();
        $categoryNew = $categoryNewRepository->getAll();
        $tagNewRepository = new TagNewRepository();
        $tagNew = $tagNewRepository->getAll();
        return view('admin.news.create')->with('admin',[
            'title' => 'Crear Noticia',
            'categoryNew' => $categoryNew,
            'tagNew' => $tagNew,
            'section' => 'news',
            'subsection' => 'save'
        ]);
    }

    /**
     * Store a newly created News in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return int $id
     */
    public function postCreate(Request $request){
        $newsRepository = new NewsRepository();
        //upload image
        $image = $request->file('feature_image');
        //prepare image name with title without special characters and spaces
        $image_name = str_replace(' ', '', $request->input('title'));
        $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
        $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/news/');
        $image->move($destinationPath, $imageName);
        //change $request feature_image content to current location of image
        $image_url = '/images/news/'.$imageName;
        //create news
        $id = $newsRepository->create($request, $image_url);

        return $id;
    }

    /**
     * edit News.
     * @param  int  $id
     * @return \Illuminate\Http\Response  $request
     */
    function edit($id){
        $newsRepository = new NewsRepository();
        $news = $newsRepository->getById($id);
        
        //obtenemos las categorias relacionadas a la noticia
        $categoryNewRepository = new CategoryNewRepository();
        $albumNewRepository = new AlbumNewRepository();
        $categoryNew = $categoryNewRepository->getAll();
        $categories = $categoryNewRepository->getByNews($id);
        $albumnew = $albumNewRepository->getAllByIdNew($id);
        $array_categories = [];
        foreach($categories as $category){
            $array_categories[] = $category->id_cat;
        }

        //obtenemos los tags relacionados a la noticia
        $tagNewRepository = new TagNewRepository();
        $tags = $tagNewRepository->getByNews($id);
        $tagNew = $tagNewRepository->getAll();
        $array_tags = [];
        foreach($tags as $tag){
            $array_tags[] = $tag->id_tag;
        }

        return view('admin.news.edit')->with('admin',[
            'title' => 'Editar Noticia',
            'news' => $news,
            'albumnew' => $albumnew,
            'categories' => $categoryNew,
            'tags' => $tagNew,
            'array_category' => $array_categories,
            'array_tag' => $array_tags,
            'section' => 'news',
            'subsection' => 'save'
        ]);
    }

    /**
     * Update the specified News in storage.
     * @param int $id
     * @return bool
     */
    function postEdit(Request $request){
        $newsRepository = new NewsRepository();
        $image_url='empty';
        if($request->input('default_image')=='none'){
            //upload image
            $image = $request->file('feature_image');
            //prepare image name with title without special characters and spaces
            $image_name = str_replace(' ', '', $request->input('title'));
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $imageName = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/news/');
            $image->move($destinationPath, $imageName);
            //change $request feature_image content to current location of image
            $image_url = '/images/news/'.$imageName;
            $request->input('feature_image', $image_url);
        }else{
            $image_url = $request->input('default_image');
            $request->input('feature_image', $request->input('default_image'));
        }
        //create news
        $id = $newsRepository->update($request,$image_url);

        return $request->input('id');
    }

    /**
     * Remove the specified News from storage.
     * @param  int  $id
     * @return bool
     */
    function delete($id){
        $newsRepository = new NewsRepository();
        $state = $newsRepository->delete($id);
        return $state;
    }

    /**
     * Change the specified News state from storage.
     * @param  int  $id
     * @return bool
     */
    function changeState($id){
        $newsRepository = new NewsRepository();
        $state = $newsRepository->changeState($id);
        return $state;
    }

    /**
     * upload album to new
     */
    function uploadAlbum(Request $request){
        $newsRepository = new NewsRepository();
        $albumNewRepository = new AlbumNewRepository();
        $id = $request->input('id');
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $destinationPath = public_path('/images/news/');
        $image->move($destinationPath, $imageName);
        $image_url = '/images/news/'.$imageName;
        $albumNewRepository->create($id, $image_url);
        return $image_url;
    }

    /**
     * delete album to new
     */
    function deleteAlbum($id){
        $albumNewRepository = new AlbumNewRepository();
        $albumNewRepository->delete($id);
        return $id;
    }

    /**
     * Vista de la front Page
     */
    public function frontPage($menu1="todo",$menu2="todo",$alias=''){
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();
        $bannerRepository = new BannerRepository();
        $categoryNewRepository = new CategoryNewRepository();
        $albumNewRepository = new AlbumNewRepository();
        $categoryNew = $categoryNewRepository->getAll();
        $new = $newRepository->getNewsByPermantlink($alias);
        $menu2 = empty($menu2)?date('m'):$this->getNumberOfMonth($menu2);
        $news = $newRepository->getNewsByYearAndMonth($menu1,$menu2);
        $last_news = $newRepository->getLastNews();
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $banners = $bannerRepository->getOne('news_detail');
        $albumnew = $albumNewRepository->getAllByIdNew($new->id);
        $menu2 = $this->getMonthName($menu2);

        $front = [
            'headers' => $headers,
            'section' => '/noticias',
            'new' => $new,
            'news' => $news,
            'last_news' => $last_news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'especialidades',
            'title'=>'Noticias',
            'categories' => $categoryNew,
            'albumnew' => $albumnew,
            'menu1' => $menu1,
            'banners' => $banners,
            'menu2' => $menu2,
        ];
        return view('pages.news')->with('front',$front);
    }

    /**
     * Vista del listado de noticias en front Page
     */
    public function frontPageList($menu1='todo', $menu2='todo'){
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();
        $bannerRepository = new BannerRepository();
        $categoryNewRepository = new CategoryNewRepository();
        $categoryNew = $categoryNewRepository->getAll();
        $menu2 = empty($menu2)?'':$this->getNumberOfMonth($menu2);
        $news = $newRepository->getNewsByYearAndMonth($menu1,$menu2);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $banners = $bannerRepository->getOne('news_detail');
        $menu2 = $menu2!=''?$this->getMonthName($menu2):'';
        $front = [
            'headers' => $headers,
            'section' => '/noticias',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'especialidades',
            'title'=>'Noticia',
            'categories' => $categoryNew,
            'menu1' => $menu1,
            'banners' => $banners,
            'menu2' => $menu2,
        ];
        return view('pages.news_list')->with('front',$front);
    }

    /**
     * Esta función obtendrá la siguiente tanda de noticias
     * @param $pag
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNewsScroll($pag=2){
        $newRepository = new NewsRepository();
        if($pag<2){
            $pag = 2;
        }
        $pag = ($pag-1)*10;
        $news = $newRepository->getNewsByYearAndMonth('todo','',$pag);
        return response()->json($news);
    }

    /**
     * Vista de la front Page
     */
    public function frontPageSchool($menu1='cursos', $menu2='entrenadores'){
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
            'section' => '/schools',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'Escuela',
            'title'=>'Escuela',
            'menu1' => $menu1,
            'menu2' => $menu2,
        ];
        return view('pages.'.$menu1)->with('front',$front);
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

    public function getNumberOfMonth($month_name){
        $month_number = '';
        switch($month_name){
            case 'enero':
                $month_number = '01';
                break;
            case 'febrero':
                $month_number = '02';
                break;
            case 'marzo':
                $month_number = '03';
                break;
            case 'abril':
                $month_number = '04';
                break;
            case 'mayo':
                $month_number = '05';
                break;
            case 'junio':
                $month_number = '06';
                break;
            case 'julio':
                $month_number = '07';
                break;
            case 'agosto':
                $month_number = '08';
                break;
            case 'septiembre':
                $month_number = '09';
                break;
            case 'octubre':
                $month_number = '10';
                break;
            case 'noviembre':
                $month_number = '11';
                break;
            case 'diciembre':
                $month_number = '12';
                break;
        }
        return $month_number;
    }

    public function getMonthName($month_number){
        $month_name = '';
        switch($month_number){
            case '01':
                $month_name = 'enero';
                break;
            case '02':
                $month_name = 'febrero';
                break;
            case '03':
                $month_name = 'marzo';
                break;
            case '04':
                $month_name = 'abril';
                break;
            case '05':
                $month_name = 'mayo';
                break;
            case '06':
                $month_name = 'junio';
                break;
            case '07':
                $month_name = 'julio';
                break;
            case '08':
                $month_name = 'agosto';
                break;
            case '09':
                $month_name = 'septiembre';
                break;
            case '10':
                $month_name = 'octubre';
                break;
            case '11':
                $month_name = 'noviembre';
                break;
            case '12':
                $month_name = 'diciembre';
                break;
        }
        return $month_name;
    }

}
