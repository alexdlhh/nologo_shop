<?php

namespace App\Http\Mappers;

use App\Http\Entities\SchoolEntity;

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
        $school->setName(!empty($data['name'])?$data['name']:'');
        $school->setAddress(!empty($data['address'])?$data['address']:'');
        $school->setPhone(!empty($data['phone'])?$data['phone']:'');
        $school->setEmail(!empty($data['email'])?$data['email']:'');
        $school->setWebsite(!empty($data['website'])?$data['website']:'');
        $school->setLogo(!empty($data['logo'])?$data['logo']:'');
        $school->setDescription(!empty($data['description'])?$data['description']:'');
        $school->setCreatedAt(!empty($data['created_at'])?$data['created_at']:date('Y-m-d H:i:s'));
        $school->setUpdatedAt(!empty($data['updated_at'])?$data['updated_at']:date('Y-m-d H:i:s'));
        $school->setUrl(!empty($data['url'])?$data['url']:'');
        $school->setStatus(!empty($data['status'])?$data['status']:0);
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