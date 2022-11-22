<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\CategoryNewRepository;
use App\Http\Repository\TagNewRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;
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
        $categories = $categoryNewRepository->getByNews($id);
        $categoryNew = $categoryNewRepository->getAll();
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

        return $id;
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
     * Vista de la front Page
     */
    public function frontPage($menu1='2022', $menu2='noviembre'){
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
            'section' => '/news',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'especialidades',
            'title'=>'Noticias',
            'menu1' => $menu1,
            'menu2' => $menu2,
        ];
        return view('pages.news')->with('front',$front);
    }

    /**
     * Vista de la front Page
     */
    public function frontPageCalendar($menu1='ritmica', $menu2='todo'){
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
            'section' => '/calendar',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'especialidades',
            'title'=>'Calendario',
            'menu1' => $menu1,
            'menu2' => $menu2,
        ];
        return view('pages.calendarios')->with('front',$front);
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

}
