<?php

namespace App\Http\Mapper;

use App\Http\Entity\SponsorEntity;

class SponsorMapper
{
    /**
     * @param array $data
     * @return SponsorEntity
     */
    public function map(array $data): SponsorEntity
    {
        $sponsor = new SponsorEntity();
        !empty($data['id']) ? $sponsor->setId($data['id']) : '';
        !empty($data['name']) ? $sponsor->setName($data['name']) : '';
        !empty($data['description']) ? $sponsor->setDescription($data['description']) : '';
        !empty($data['image']) ? $sponsor->setImage($data['image']) : '';
        !empty($data['created_at']) ? $sponsor->setCreatedAt($data['created_at']) : '';
        !empty($data['updated_at']) ? $sponsor->setUpdatedAt($data['updated_at']) : '';
        !empty($data['url']) ? $sponsor->setUrl($data['url']) : '';
        !empty($data['white']) ? $sponsor->setWhite($data['white']) : '';
        return $sponsor;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection($data): array
    {
        $sponsors = [];
        foreach ($data as $item) {
            if(is_array($item)) {
                $sponsors[] = $this->map($item);
            }else{
                $sponsors[] = $this->map(get_object_vars($item));
            }
        }
        return $sponsors;
    }
}