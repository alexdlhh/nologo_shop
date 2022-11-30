<?php
namespace App\Http\Mapper;

use App\Http\Entity\Table2Entity;

class Table2Mapper
{
    public function map($data)
    {
        $table2 = new Table2Entity();
        !empty($data['id'])?$table2->setId($data['id']):'';
        !empty($data['nombre'])?$table2->setNombre($data['nombre']):'';
        !empty($data['cargo'])?$table2->setCargo($data['cargo']):'';
        !empty($data['especialidad'])?$table2->setEspecialidad($data['especialidad']):'';
        !empty($data['order'])?$table2->setOrder($data['order']):'';
        return $table2;
    }

    public function mapCollection($data)
    {
        $table2List = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $table2List[] = $this->map($item);
            }else{
                $table2List[] = $this->map(get_object_vars($item));
            }
        }
        return $table2List;
    }
}