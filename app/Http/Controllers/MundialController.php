<?php

namespace App\Http\Controllers;

use App\Http\Repository\SponsorRepository;
use Illuminate\Http\Request;
use App\Http\Repository\PagesRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\GeneralRepository;

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
            'general' => $general,
            'rs' => $rs,
        ]);
    }   
   
}