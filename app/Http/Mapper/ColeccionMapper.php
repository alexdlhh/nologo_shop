<?php
namespace App\Http\Mapper;

use App\Http\Entity\ColeccionEntity;

class ColeccionMapper
{
    public function map(array $data)
    {
        $coleccion = new ColeccionEntity();
        !empty($data['id'])?$coleccion->setId($data['id']):'';
        !empty($data['name'])?$coleccion->setName($data['name']):'';
        !empty($data['created_at'])?$coleccion->setCreatedAt($data['created_at']):'';
        !empty($data['updated_at'])?$coleccion->setUpdatedAt($data['updated_at']):'';
        return $coleccion;
    }

    public function mapCollection($data)
    {
        $coleccionList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $coleccionList[] = $this->map($item);
            }else{
                $coleccionList[] = $this->map(get_object_vars($item));
            }
        }
        return $coleccionList;
    }
}