<?php
namespace App\Http\Mapper;

use App\Http\Entity\ComisionesTecnicasEntity;

class ComisionesTecnicasMapper
{
    public function map($data)
    {
        $comisionesTecnicas = new ComisionesTecnicasEntity();
        !empty($data['id'])?$comisionesTecnicas->setId($data['id']):'';
        !empty($data['name'])?$comisionesTecnicas->setName($data['name']):'';
        !empty($data['posicion'])?$comisionesTecnicas->setPosicion($data['posicion']):'';
        !empty($data['order'])?$comisionesTecnicas->setOrder($data['order']):'';
        !empty($data['image'])?$comisionesTecnicas->setImage($data['image']):'';
        !empty($data['especialidad'])?$comisionesTecnicas->setEspecialidad($data['especialidad']):'';
        return $comisionesTecnicas;
    }

    public function mapCollection($data)
    {
        $comisionesTecnicasList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $comisionesTecnicasList[] = $this->map($item);
            }else{
                $comisionesTecnicasList[] = $this->map(get_object_vars($item));
            }
        }
        return $comisionesTecnicasList;
    }
}