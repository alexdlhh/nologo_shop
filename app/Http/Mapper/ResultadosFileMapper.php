<?php
namespace App\Http\Mapper;

use App\Http\Entity\ResultadosFileEntity;

class ResultadosFileMapper
{
    public function map($data)
    {
        $resultadosFile = new ResultadosFileEntity();
        !empty($data['id'])?$resultadosFile->setId($data['id']):'';
        !empty($data['id_resultados'])?$resultadosFile->setIdResultados($data['id_resultados']):'';
        !empty($data['nombre'])?$resultadosFile->setNombre($data['nombre']):'';
        !empty($data['documento'])?$resultadosFile->setDocumento($data['documento']):'';
        return $resultadosFile;
    }

    public function mapCollection($data)
    {
        $resultadosFileList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $resultadosFileList[] = $this->map($item);
            }else{
                $resultadosFileList[] = $this->map(get_object_vars($item));
            }
        }
        return $resultadosFileList;
    }
}