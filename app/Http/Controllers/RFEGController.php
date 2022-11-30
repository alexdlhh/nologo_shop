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

    public function __construct(PagesRepository $pagesRepository, NewsRepository $newsRepository, CategoryNewRepository $categoryNewRepository, TagNewRepository $tagNewRepository, RSRepository $rsRepository, SponsorRepository $sponsorRepository, AlbumNewRepository $albumNewRepository, BannerRepository $bannerRepository)
    {
        $this->pagesRepository = $pagesRepository;
        $this->newsRepository = $newsRepository;
        $this->categoryNewRepository = $categoryNewRepository;
        $this->tagNewRepository = $tagNewRepository;
        $this->rsRepository = $rsRepository;
        $this->sponsorRepository = $sponsorRepository;
        $this->albumNewRepository = $albumNewRepository;
        $this->bannerRepository = $bannerRepository;
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
        if($seccion == 'gobierno'){
            $table = 2;
        }
        if($seccion != 'normativa'){
            $table = 1;
        }
        $table_content = []; //array de objetos 
        return view('admin.rfeg.list', [
            'admin'=>[
                'title'=>'RFEG',
                'section' => 'rfeg',
                'subsection' => 'adminrfef',
                'table' => $table,
                ]]);
    }
}