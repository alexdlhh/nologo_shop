<?php

namespace App\Http\Repository;

use App\Http\Entity\EventoEntity;
use App\Http\Mapper\EventoMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventoRepository
{
    /**
     * Obtenemos todos los eventos del mes donde la fecha , licencia, incripcion, sorteo o fecha fin, estén dentro del mes
     */
    public function getEventosByMonth($month, $year)
    {
        $eventos = DB::table('evento')
            ->whereMonth('fecha', $month)
            ->whereYear('fecha', $year)
            ->orWhereMonth('licencia', $month)
            ->whereYear('licencia', $year)
            ->orWhereMonth('inscripcion', $month)
            ->whereYear('inscripcion', $year)
            ->orWhereMonth('sorteo', $month)
            ->whereYear('sorteo', $year)
            ->orWhereMonth('fecha_fin', $month)
            ->whereYear('fecha_fin', $year)
            ->get();
            $eventoMapper = new EventoMapper();
            return $eventoMapper->mapCollection($eventos);
    }
    
    /**
     * Queremos montar un ojeto calendario el cual va a ser una matriz de 7 por X donde X es el numero de semanas que tiene el mes
     * el array tendra la estructura de una semana por fila y los dias de la semana por columna
     * donde no se pueda poner nada se pondra un -
     */
    public function getCalendarObject($month, $year)
    {
        $calendar = [];
        $week = [];
        $firstDay = date('N', strtotime($year . '-' . $month . '-01'));
        $lastDay = date('t', strtotime($year . '-' . $month . '-01'));
        $day = 1;
        $weekDay = 1;
        $weekNumber = 1;
        $week[$weekDay] = '-';
        while ($day <= $lastDay) {
            if ($weekDay == $firstDay) {
                $week[$weekDay] = $day;
                $day++;
            } elseif ($weekDay > $firstDay || $weekNumber > 1) {
                $week[$weekDay] = $day;
                $day++;
            } else {
                $week[$weekDay] = '-';
            }
            if ($weekDay == 7) {
                $calendar[$weekNumber] = $week;
                $week = [];
                $weekDay = 0;
                $weekNumber++;
            }
            $weekDay++;
        }
        if ($weekDay != 1) {
            for ($i = $weekDay; $i <= 7; $i++) {
                $week[$i] = '-';
            }
            $calendar[$weekNumber] = $week;
        }
        return $calendar;
    }

    /**
     * saveEvent
     * Guardamos un evento
     */
    public function saveEvent(Request $request,$archivo='',$image=''){
        $eventoMapper = new EventoMapper();
        $evento = $eventoMapper->map($request->all());
        if($evento->getId()==0){
            if(!empty($archivo)){
                $id = DB::table('evento')
                    ->insertGetId([
                        'competicion' => $evento->getCompeticion(),
                        'fecha' => $evento->getFecha(),
                        'fecha_fin' => $evento->getFechaFin(),
                        'licencia' => !empty($evento->getLicencia())?$evento->getLicencia():'0001-01-01',
                        'inscripcion' => !empty($evento->getInscripcion())?$evento->getInscripcion():'0001-01-01',
                        'sorteo' => !empty($evento->getSorteo())?$evento->getSorteo():'0001-01-01',
                        'especialidad' => $evento->getEspecialidad(),
                        'nacional' => !empty($evento->getNacional()) ? $evento->getNacional() : 0,
                        'olimpico' => !empty($evento->getOlimpico()) ? $evento->getOlimpico() : 0,
                        'download_pdf' => $archivo,
                        'active' => !empty($evento->getActive()) ? $evento->getActive() : 0,
                ]);
            }else{
                $id = DB::table('evento')
                    ->insertGetId([
                        'competicion' => $evento->getCompeticion(),
                        'fecha' => $evento->getFecha(),
                        'fecha_fin' => $evento->getFechaFin(),
                        'licencia' => !empty($evento->getLicencia())?$evento->getLicencia():'0001-01-01',
                        'inscripcion' => !empty($evento->getInscripcion())?$evento->getInscripcion():'0001-01-01',
                        'sorteo' => !empty($evento->getSorteo())?$evento->getSorteo():'0001-01-01',
                        'especialidad' => $evento->getEspecialidad(),
                        'nacional' => !empty($evento->getNacional()) ? $evento->getNacional() : 0,
                        'olimpico' => !empty($evento->getOlimpico()) ? $evento->getOlimpico() : 0,
                        'active' => !empty($evento->getActive()) ? $evento->getActive() : 0,
                ]);
            }
            if(!empty($image)){
                DB::table('evento')
                    ->where('id', $id)
                    ->update([
                        'image' => $image,
                ]);
            }
        }else{
            $id = $evento->getId();
            if(!empty($archivo)){
                DB::table('evento')
                    ->where('id', $id)
                    ->update([
                        'competicion' => $evento->getCompeticion(),
                        'fecha' => $evento->getFecha(),
                        'fecha_fin' => $evento->getFechaFin(),
                        'licencia' => !empty($evento->getLicencia())?$evento->getLicencia():'0001-01-01',
                        'inscripcion' => !empty($evento->getInscripcion())?$evento->getInscripcion():'0001-01-01',
                        'sorteo' => !empty($evento->getSorteo())?$evento->getSorteo():'0001-01-01',
                        'especialidad' => $evento->getEspecialidad(),
                        'nacional' => !empty($evento->getNacional()) ? $evento->getNacional() : 0,
                        'olimpico' => !empty($evento->getOlimpico()) ? $evento->getOlimpico() : 0,
                        'download_pdf' => $archivo,
                        'active' => !empty($evento->getActive()) ? $evento->getActive() : 0,
                ]);
            }else{
                DB::table('evento')
                    ->where('id', $id)
                    ->update([
                        'competicion' => $evento->getCompeticion(),
                        'fecha' => $evento->getFecha(),
                        'fecha_fin' => $evento->getFechaFin(),
                        'licencia' => !empty($evento->getLicencia())?$evento->getLicencia():'0001-01-01',
                        'inscripcion' => !empty($evento->getInscripcion())?$evento->getInscripcion():'0001-01-01',
                        'sorteo' => !empty($evento->getSorteo())?$evento->getSorteo():'0001-01-01',
                        'especialidad' => $evento->getEspecialidad(),
                        'nacional' => !empty($evento->getNacional()) ? $evento->getNacional() : 0,
                        'olimpico' => !empty($evento->getOlimpico()) ? $evento->getOlimpico() : 0,
                        'active' => !empty($evento->getActive()) ? $evento->getActive() : 0,
                ]);
            } 
            if(!empty($image)){
                DB::table('evento')
                    ->where('id', $id)
                    ->update([
                        'image' => $image,
                ]);
            }           
        }
        return $id;
    }

    /**
     * deleteEvent
     */
    public function deleteEvent($id){
        DB::table('evento')->where('id', '=', $id)->delete();
    }

    /**
     * getEvents by especialidad alias
     */
    public function getEventsByEspecialidadAlias($alias){
        $eventos = DB::table('evento')
            ->join('especialidades', 'evento.especialidad', '=', 'especialidades.acronimo')
            ->select('evento.*')
            ->where('especialidades.alias', '=', $alias)
            ->where('evento.active', '=', 1)
            ->orderBy('evento.fecha', 'asc')
            ->get();
        $eventoMapper = new EventoMapper();
        return $eventoMapper->mapCollection($eventos);
    }

    public function getEventsByYearAndMonthAndPersonalCalendar($year,$month,$personal){
        $eventoMapper = new EventoMapper();
        $personal = json_decode($personal);
        $eventos = array();
        if(!empty($personal)){
            foreach($personal as $p){
                if($p == 1){
                    $esp = 'GAM';
                }
                if($p == 2){
                    $esp = 'GAF';
                }
                if($p == 3){
                    $esp = 'GR';
                }
                if($p == 4){
                    $esp = 'TRAM';
                }
                if($p == 5){
                    $esp = 'AERO';
                }
                if($p == 6){
                    $esp = 'ACRO';
                }
                if($p == 7){
                    $esp = 'PT';
                }
                if($p == 8){
                    $esp = 'PK';
                }
                //buscamos eventos cuya fecha actual este entre los campos fecha y fecha_fin
                $res = DB::table('evento')
                    ->where('fecha', '<=', $year.'-'.$month.'-31')
                    ->where('fecha_fin', '>=', $year.'-'.$month.'-01')
                    ->orderBy('fecha', 'asc')
                    ->get();
                foreach($res as $r){
                    if($r->especialidad == $esp){
                        $eventos[]=$r;
                    }
                }
            }
        }
        return $eventoMapper->mapCollection($eventos);
    }

    public function getEventsByYearAndMonthAndPersonal($year,$month,$personal){
        $eventoMapper = new EventoMapper();
        $personal = json_decode($personal);
        $eventos = array();
        if(!empty($personal)){
            foreach($personal as $p){
                if($p == 1){
                    $esp = 'GAM';
                }
                if($p == 2){
                    $esp = 'GAF';
                }
                if($p == 3){
                    $esp = 'GR';
                }
                if($p == 4){
                    $esp = 'TRAM';
                }
                if($p == 5){
                    $esp = 'AERO';
                }
                if($p == 6){
                    $esp = 'ACRO';
                }
                if($p == 7){
                    $esp = 'PT';
                }
                if($p == 8){
                    $esp = 'PK';
                }
                //buscamos eventos de la especialidad $p cuyos campos licencia, inscripcion o sorteo sean cercanos a la fecha actual
                $res = DB::table('evento')
                    ->where('evento.active', '=', 1)
                    ->where('evento.licencia', '>=', date('Y-m-d'))
                    ->orWhere('evento.inscripcion', '>=', date('Y-m-d'))
                    ->orWhere('evento.sorteo', '>=', date('Y-m-d'))->get();
                foreach($res as $r){
                    if($r->especialidad == $esp){
                        $eventos[]=$r;
                    }
                }
            }
        }
        return $eventoMapper->mapCollection($eventos);
    }

    public function search($search){
        $eventoMapper = new EventoMapper();
        $eventos = DB::table('evento')
            ->where('evento.competicion', 'like', '%'.$search.'%')
            ->orderBy('evento.fecha', 'asc')
            ->get();
        return $eventoMapper->mapCollection($eventos);
    }

    public function basicsearch($search){
        $eventoMapper = new EventoMapper();
        $eventos = DB::table('evento')
            ->where('evento.active', '=', 1)
            ->where('evento.competicion', 'like', '%'.$search.'%')
            ->orderBy('evento.fecha', 'asc')
            ->get();
        return $eventoMapper->mapCollection($eventos);
    }
}