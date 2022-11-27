<?php

namespace App\Http\Controllers;

use App\Http\Repository\SponsorRepository;
use Illuminate\Http\Request;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\NewsRepository;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sponsors()
    {
        $sponsorRepository = new SponsorRepository();
        $sponsors = $sponsorRepository->getAll();
        return view('admin.sponsor.list')->with('admin',[
            'title' => 'Listado de Sponsors',
            'sponsors' => $sponsors,
            'section' => 'sponsor',
            'subsection' => 'listsponsor'
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int $id
     */
    public function postCreate(Request $request)
    {
        $sponsorRepository = new SponsorRepository();
        $image_url= '';
        $image_white= '';
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/images/sponsors'), $imageName);
            $image_url = '/images/sponsors/'.$imageName;
        }
        if(!empty($request->file('white'))){
            $image = $request->file('white');
            $imageName = time().'_white.'.$image->getClientOriginalExtension();
            $image->move(public_path('/images/sponsors'), $imageName);
            $image_white = '/images/sponsors/'.$imageName;
        }
        if($request->id == 0){
            $id = $sponsorRepository->create($request,$image_url,$image_white);
        } else {
            $id = $sponsorRepository->update($request,$request->id,$image_url,$image_white);
        }
        
        return $id;
    }
    
    /**
     * Delete a newly created resource in storage.
     */
    public function postDelete(int $id)
    {
        $sponsorRepository = new SponsorRepository();
        $sponsorRepository->delete($id);
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSponsor()
    {
        $pagesRepository = new PagesRepository();
        $pages = $pagesRepository->getAll();
        return view('admin.sponsor.create')->with('admin',[
            'title' => 'Crear Sponsor',
            'pages' => $pages,
            'section' => 'sponsor',
            'subsection' => 'savesponsor'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSponsor(int $id)
    {
        $sponsorRepository = new SponsorRepository();
        $sponsor = $sponsorRepository->getOne($id);
        $pagesRepository = new PagesRepository();
        $pages = $pagesRepository->getAll();
        return view('admin.sponsor.edit')->with('admin',[
            'title' => 'Editar Sponsor',
            'sponsor' => $sponsor,
            'pages' => $pages,
            'section' => 'sponsor',
            'subsection' => 'savesponsor'
        ]);
    }

    /**
     * fontpage of sponsros
     */
    /**
     * Vista de la front Page
     */
    public function frontPage($menu1='todo'){
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();
        $news = $newRepository->getNews(5);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $_sponsor = [];
        foreach($sponsors as $sponsor){
            $_sponsor[$sponsor->type][] = $sponsor;
        }
        $sponsors = $_sponsor;
        $front = [
            'headers' => $headers,
            'section' => '/patrocinadores',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'patrocinadores',
            'title'=>'Patrocinadores',
            'menu1' => $menu1
        ];
        return view('pages.patrocinadores')->with('front',$front);
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