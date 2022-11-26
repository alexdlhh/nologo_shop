<?php

namespace App\Http\Controllers\Pages;

use App\Http\Repository\PagesRepository;
use App\Http\Helpers\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;

class HomeController extends Controller
{
    /**
     * Show the web HomePage.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();
        $news = $newRepository->getNewsByYearAndMonth(date('Y'),date('m'));
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $front = [
            'headers' => $headers,
            'section' => 'RFEG',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors
        ];
        return view('pages.home')->with('front',$front);
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
