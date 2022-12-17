<?php
namespace App\Http\Mapper;

use App\Http\Entity\Table7Entity;

class Table7Mapper
{
    public function map($data)
    {
        $table7 = new Table7Entity();
        !empty($data['id'])?$table7->setId($data['id']):'';
        !empty($data['image'])?$table7->setImage($data['image']):'';
        !empty($data['titulo'])?$table7->setTitulo($data['titulo']):'';
        !empty($data['direccion'])?$table7->setDireccion($data['direccion']):'';
        !empty($data['phone'])?$table7->setPhone($data['phone']):'';
        !empty($data['fax'])?$table7->setFax($data['fax']):'';
        !empty($data['web'])?$table7->setWeb($data['web']):'';
        !empty($data['email'])?$table7->setEmail($data['email']):'';
        !empty($data['rfeg_title'])?$table7->setRfegTitle($data['rfeg_title']):'';
        return $table7;
    }

    public function mapCollection($data)
    {
        $table7List = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $table7List[] = $this->map($item);
            }else{
                $table7List[] = $this->map(get_object_vars($item));
            }
        }
        return $table7List;
    }
}