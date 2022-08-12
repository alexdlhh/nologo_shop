<?php

namespace App\Http\Mapper;

use App\Http\Entities\SponsorEntity;

class SponsorMapper
{
    /**
     * @param array $data
     * @return SponsorEntity
     */
    public function map(array $data): SponsorEntity
    {
        $sponsor = new SponsorEntity();
        $sponsor->setId($data['id']);
        $sponsor->setName($data['name']);
        $sponsor->setDescription($data['description']);
        $sponsor->setImage($data['image']);
        $sponsor->setCreatedAt($data['created_at']);
        $sponsor->setUpdatedAt($data['updated_at']);
        $sponsor->setUrl($data['url']);
        return $sponsor;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
    {
        $sponsors = [];
        foreach ($data as $item) {
            $sponsors[] = $this->map($item);
        }
        return $sponsors;
    }
}