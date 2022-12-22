<?php

namespace App\Http\Controllers\Pages;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Http\Repository\PagesRepository;
use App\Http\Helpers\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repository\NewsRepository;
use App\Http\Repository\RSRepository;
use App\Http\Repository\SponsorRepository;
use App\Http\Repository\GeneralRepository;
use App\Http\Repository\EventoRepository;
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
        $generalRepository = new GeneralRepository();
        $eventoRepository = new EventoRepository();
        $preferencias = Auth::user()->preferences;
        $news = $newRepository->getNewsByYearAndMonth(date('Y'),date('m'));

        $areaPersonal = [
            'news' => $newRepository->getNewsByYearAndMonthAndPersonal(date('Y'),date('m'),$preferencias),
            'calendarios' => $eventoRepository->getEventsByYearAndMonthAndPersonalCalendar(date('Y'),date('m'),$preferencias),
            'eventos' => $eventoRepository->getEventsByYearAndMonthAndPersonal(date('Y'),date('m'),$preferencias),
        ];

        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $general = $generalRepository->getConfigGeneral();
        $sponsors = $sponsorRepository->getAll();
        $front = [
            'headers' => $headers,
            'section' => '',
            'news' => $news,
            'general' => $general,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'areaPersonal' => $areaPersonal
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
