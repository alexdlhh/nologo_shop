<?php

namespace App\Http\Mapper;

use App\Http\Entities\RSEntity;

class RSMapper{
    /**
     * @param array $data
     * @return RSEntity
     */
    public function map(array $data): RSEntity
    {
        $rs = new RSEntity();
        !empty($data['id']) ? $rs->setId($data['id']) : '';
        !empty($data['name']) ? $rs->setName($data['name']) : '';
        !empty($data['description']) ? $rs->setDescription($data['description']) : '';
        !empty($data['icon']) ? $rs->setImage($data['icon']) : '';
        !empty($data['created_at']) ? $rs->setCreatedAt($data['created_at']) : '';
        !empty($data['updated_at']) ? $rs->setUpdatedAt($data['updated_at']) : '';
        !empty($data['url']) ? $rs->setUrl($data['url']) : '';
        return $rs;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
    {
        $rs = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $rs[] = $this->map($item);
            }else{
                $rs[] = $this->map(get_object_vars($item));
            }
        }
        return $rs;
    }
}