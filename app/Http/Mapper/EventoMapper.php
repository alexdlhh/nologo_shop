<?php
namespace App\Http\Mapper;

use App\Http\Entity\EventoEntity;

class EventoMapper
{
    public function map($data)
    {
        $evento = new EventoEntity();
        !empty($data['id'])?$evento->setId($data['id']):'';
        !empty($data['competicion'])?$evento->setCompeticion($data['competicion']):'';
        !empty($data['fecha'])?$evento->setFecha($data['fecha']):'';
        !empty($data['licencia'])?$evento->setLicencia($data['licencia']):'null';
        !empty($data['inscripcion'])?$evento->setInscripcion($data['inscripcion']):'null';
        !empty($data['sorteo'])?$evento->setSorteo($data['sorteo']):'null';
        !empty($data['especialidad'])?$evento->setEspecialidad($data['especialidad']):'';
        !empty($data['nacional'])?$evento->setNacional($data['nacional']):0;
        !empty($data['active'])?$evento->setActive($data['active']):0;
        !empty($data['download_pdf'])?$evento->setDownloadPdf($data['download_pdf']):'';
        !empty($data['fecha_fin'])?$evento->setFechaFin($data['fecha_fin']):date('Y-m-d');
        !empty($data['olimpico'])?$evento->setOlimpico($data['olimpico']):0;
        return $evento;
    }

    public function mapCollection($data)
    {
        $eventoList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $eventoList[] = $this->map($item);
            }else{
                $eventoList[] = $this->map(get_object_vars($item));
            }
        }
        return $eventoList;
    }
}