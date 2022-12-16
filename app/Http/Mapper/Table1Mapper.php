<?php
namespace App\Http\Mapper;

use App\Http\Entity\Table1Entity;

class Table1Mapper{
    public function map($data)
    {
        $table1 = new Table1Entity();
        !empty($data['id'])?$table1->setId($data['id']):'';
        !empty($data['documento'])?$table1->setDocumento($data['documento']):'';
        !empty($data['created_at'])?$table1->setCreated_at($data['created_at']):'';
        !empty($data['updated_at'])?$table1->setUpdated_at($data['updated_at']):'';
        !empty($data['download_pdf'])?$table1->setDownload_pdf($data['download_pdf']):'';
        !empty($data['rfeg_title'])?$table1->setRfeg_title($data['rfeg_title']):'';
        !empty($data['order'])?$table1->setOrder($data['order']):'';
        !empty($data['especialidad'])?$table1->setEspecialidad($data['especialidad']):'';
        return $table1;
    }

    public function mapCollection($data)
    {
        $table1List = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $table1List[] = $this->map($item);
            }else{
                $table1List[] = $this->map(get_object_vars($item));
            }
        }
        return $table1List;
    }
}