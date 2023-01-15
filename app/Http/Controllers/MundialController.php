<?php

namespace App\Http\Controllers;

use App\Http\Repository\SponsorRepository;
use Illuminate\Http\Request;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\GeneralRepository;
use App\Http\Repository\MundialRepository;

class MundialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mundial()
    {
        $generalRepository = new GeneralRepository();
        $general = $generalRepository->getConfigGeneral();
        $mundialRepository = new MundialRepository();
        $mundial = $mundialRepository->getConfigMundial();
        $sponsorRepository = new SponsorRepository();
        $sponsors = $sponsorRepository->getAll();
        $RSRepository = new RSRepository();
        $rs = $RSRepository->getAll();
        $_sponsor = [];
        foreach($sponsors as $sponsor){
            $_sponsor[$sponsor->type][] = $sponsor;
        }
        $sponsors = $_sponsor;
        return view('pages.mundial')->with('front',[
            'title' => 'Mundial',
            'sponsors' => $sponsors,
            'section' => 'mundial',
            'subsection' => 'mundial',
            'mundial' => $mundial,
            'general' => $general,
            'rs' => $rs,
        ]);
    }   

    public function adminMundialGeneral(){
        $mundialRepository = new MundialRepository();
        $mundial = $mundialRepository->getConfigMundial();
        return view('admin.mundial.general', ['admin'=>[
            'title'=>'Mundial',
            'mundial'=>$mundial,
            'id'=>1,
            'section' => 'mundial',
            'subsection' => 'general']]);
    }
    public function adminMundialMundial(){
        $mundialRepository = new MundialRepository();
        $mundial = $mundialRepository->getConfigMundial();
        return view('admin.mundial.mundial', ['admin'=>[
            'title'=>'Mundial',
            'mundial'=>$mundial,
            'id'=>1,
            'section' => 'mundial',
            'subsection' => 'mundial']]);
    }
    public function adminMundialValencia(){
        $mundialRepository = new MundialRepository();
        $mundial = $mundialRepository->getConfigMundial();
        return view('admin.mundial.valencia', ['admin'=>[
            'title'=>'Mundial',
            'mundial'=>$mundial,
            'id'=>1,
            'section' => 'mundial',
            'subsection' => 'valencia']]);
    }

    public function saveMundial(Request $request){
        $mundialRepository = new MundialRepository();
        if($request->input('type')=='img'){
            $file = $request->file('content');
            $name = date('Ymdhis').'_'.$file->getClientOriginalName();
            $file->move(public_path().'/mundial/', $name);
            $content = '/mundial/'.$name;
        }else{
            $content = $request->input('content');
        }
        $id = $request->input('id');
        $mundialRepository->update($id,$content);
        return response()->json(['msg' => 'ok']);
    }
   
}