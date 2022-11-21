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
        !empty($data['create_at'])?$coleccion->setCreatedAt($data['create_at']):date('Y-m-d H:i:s');
        !empty($data['update_at'])?$coleccion->setUpdatedAt($data['update_at']):date('Y-m-d H:i:s');
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