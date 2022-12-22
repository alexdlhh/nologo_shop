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
use App\Http\Repository\EventoRepository;
use App\Http\Repository\EspecialidadesRepository;
use App\Http\Repository\GeneralRepository;

class CalendarController extends Controller
{
    /**
     * Vista de la front Page
     */
    public function frontPage($menu1='ritmica', $menu2='todo'){
        //$common = new Common();
        $pageRepository = new PagesRepository();
        $newRepository = new NewsRepository();
        $RSRepository = new RSRepository();
        $sponsorRepository = new SponsorRepository();
        $eventoRepository = new EventoRepository();
        $generalRepository = new GeneralRepository();
        $eventos = $eventoRepository->getEventsByEspecialidadAlias($menu1);
        $aux=[];
        foreach($eventos as $evento){
            if($menu2 == 'nacional'){
                if($evento->getNacional() == 1){
                    $aux[] = $evento;
                }
            }elseif($menu2 == 'internacional'){
                if($evento->getNacional() == 0){
                    $aux[] = $evento;
                }
            }else{
                $aux[] = $evento;
            }
        }
        $eventos = $aux;
        $news = $newRepository->getNews(5);
        $headers = $this->header_order($pageRepository->getAll('section','=','1'));
        $rs = $RSRepository->getAll();
        $sponsors = $sponsorRepository->getAll();
        $general = $generalRepository->getConfigGeneral();
        $front = [
            'headers' => $headers,
            'section' => '/calendario',
            'news' => $news,
            'rs' => $rs,
            'sponsors' => $sponsors,
            'subsection' => 'especialidades',
            'title'=>'Calendario',
            'menu1' => $menu1,
            'general' => $general,
            'menu2' => $menu2,
            'eventos' => $eventos,
        ];
        return view('pages.calendarios')->with('front',$front);
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

    /**
     * getMonth
     */
    public function getMonth($month=0, $year=0){
        $eventoRepository = new EventoRepository();
        $especialidadesRepository = new EspecialidadesRepository();
        if($month == 0)
            $month = date('m');
        if($year == 0)
            $year = date('Y');
        $eventos = $eventoRepository->getEventosByMonth($month, $year);
        $calendar = $eventoRepository->getCalendarObject($month, $year);
        $especialidades = $especialidadesRepository->getAll();
        return view('admin.calendar.app', [
            'admin'=>[
            'title'=>'Calendario',
            'section' => 'especialidades',
            'subsection' => 'calendario',
            'year' => $year,
            'month' => $month,
            'eventos' => $eventos,
            'calendar' => $calendar,
            'especialidades' => $especialidades,
            ]]);
    }

    /**
     * Save Event if id is 0 the create a new event else update the event
     */
    public function save(Request $request){
        $eventoRepository = new EventoRepository();
        $archivo = '';
        $image = '';
        if($request->hasFile('download_pdf')){
            $file = $request->file('download_pdf');
            //hora exacta para que el archivo no se repita
            $name = date('YmdHis').'_'.$file->getClientOriginalName();
            $file->move(public_path().'/files/calendar/pdf/', $name);
            $request->merge(['download_pdf' => $name]);
            $archivo = '/files/calendar/pdf/'.$name;
        }
        if($request->hasFile('image')){
            $file = $request->file('image');
            //hora exacta para que el archivo no se repita
            $name = date('YmdHis').'_'.$file->getClientOriginalName();
            $file->move(public_path().'/files/calendar/images/', $name);
            $request->merge(['image' => $name]);
            $image = '/files/calendar/images/'.$name;
        }
        $evento = $eventoRepository->saveEvent($request,$archivo,$image);
        return response()->json($evento);
    }

    /**
     * Delete Event
     */
    public function delete($id){
        $eventoRepository = new EventoRepository();
        $evento = $eventoRepository->deleteEvent($id);
        return response()->json($evento);
    }

}