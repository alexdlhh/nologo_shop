<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\SchoolRepository;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\CategoryNewRepository;
use App\Http\Repository\TagNewRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;
use App\Http\Repository\AlbumNewRepository;
use App\Http\Repository\BannerRepository;
use App\Http\Repository\RFEGTitleRepository;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function normativas(){
        $schoolRepository = new SchoolRepository();
        $rfegTitleRepository = new RFEGTitleRepository();
        $normativas = $schoolRepository->getNormativasAdmin();
        $rfeg_title = $rfegTitleRepository->getStatic('normativas');

        return view('admin.normativas.list')->with(['admin'=>[
            'normativas'=>$normativas, 
            'title'=>'Cursos', 
            'section' => 'school',
            'subsection' => 'normativa_school', 
            'rfeg_title'=>$rfeg_title]]);
    }

    /**
     * Vista de la front Page
     */
    public function frontPage($menu1='cursos', $menu2='todo'){
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();  
        $courseRepository = new CourseRepository();    
        $rfegTitleRepository = new RFEGTitleRepository();  
        $schoolRepository = new SchoolRepository();
        $news = $newRepository->getNews(5);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $courses=$normativas=[];
        $rfeg_title = $rfegTitleRepository->getStatic($menu1);
        if($menu1=='cursos'){
            $courses = $courseRepository->getAll($menu2=='todo'?'':$menu2);
        }else{
            $normativas = $schoolRepository->getNormativas($menu2=='todo'?'':$menu2);
        }
        if($menu2!='todo'){
            $_rfeg_title=[];
            foreach($rfeg_title as $_title){
                if($_title->getType()==$menu2){
                    $_rfeg_title[] = $_title;
                }
            }
            $rfeg_title = $_rfeg_title;
        }
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
            'normativas' => $normativas,
            'courses' => $courses,
            'rfeg_title' => $rfeg_title
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

    public function save(Request $request){
        $schoolRepository = new SchoolRepository();
        $download_pdf=$return ='';
        if($request->hasFile('download_pdf')){
            $file = $request->file('download_pdf');
            $download_pdf = time().$file->getClientOriginalName();
            $file->move(public_path().'/files/normativas_school/',$download_pdf);
            $download_pdf = '/files/normativas_school/'.$download_pdf;
        }
        if($request->input('id')==0){
            $return = $schoolRepository->create($request,$download_pdf);
        }else{
            $return = $schoolRepository->update($request,$download_pdf);
        }
        return $return;
    }
}