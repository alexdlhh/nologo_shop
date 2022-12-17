<?php
namespace App\Http\Mapper;

use App\Http\Entity\ResultadosEntity;

class ResultadosMapper
{
    public function map($data)
    {
        $resultados = new ResultadosEntity();
        !empty($data['id'])?$resultados->setId($data['id']):'';
        !empty($data['especialidad'])?$resultados->setEspecialidad($data['especialidad']):'';
        !empty($data['name'])?$resultados->setName($data['name']):'';
        !empty($data['fecha_inicio'])?$resultados->setFechaInicio($data['fecha_inicio']):'';
        !empty($data['fecha_fin'])?$resultados->setFechaFin($data['fecha_fin']):'';
        !empty($data['lugar'])?$resultados->setLugar($data['lugar']):'';
        return $resultados;
    }

    public function mapCollection($data)
    {
        $resultadosList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $resultadosList[] = $this->map($item);
            }else{
                $resultadosList[] = $this->map(get_object_vars($item));
            }
        }
        return $resultadosList;
    }
}