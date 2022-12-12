<?php

namespace App\Http\Mapper;

use App\Http\Entity\SchoolEntity;

class SchoolMapper
{
    /**
     * @param array $data
     * @return SchoolEntity
     */
    public function map(array $data): SchoolEntity
    {
        $school = new SchoolEntity();
        $school->setId(!empty($data['id'])?$data['id']:0);
        $school->setDocumento(!empty($data['documento'])?$data['documento']:'');
        $school->setCreatedAt(!empty($data['created_at'])?$data['created_at']:date('Y-m-d H:i:s'));
        $school->setUpdatedAt(!empty($data['updated_at'])?$data['updated_at']:date('Y-m-d H:i:s'));
        $school->setDownloadPdf(!empty($data['download_pdf'])?$data['download_pdf']:'');
        $school->setType(!empty($data['type'])?$data['type']:'');
        $school->setActive(!empty($data['active'])?$data['active']:0);
        
        return $school;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
    {
        $schools = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $schools[] = $this->map($item);
            }else{
                $schools[] = $this->map(get_object_vars($item));
            }
        }
        return $schools;
    }
}