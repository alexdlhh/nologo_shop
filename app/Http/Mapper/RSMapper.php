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
        $rs->setId($data['id']);
        $rs->setName($data['name']);
        $rs->setDescription($data['description']);
        $rs->setIcon($data['icon']);
        $rs->setCreatedAt($data['created_at']);
        $rs->setUpdatedAt($data['updated_at']);
        $rs->setUrl($data['url']);
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
            $rs[] = $this->map($item);
        }
        return $rs;
    }
}