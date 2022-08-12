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
        $school->setId($data['id']);
        $school->setName($data['name']);
        $school->setAddress($data['address']);
        $school->setPhone($data['phone']);
        $school->setEmail($data['email']);
        $school->setWebsite($data['website']);
        $school->setLogo($data['logo']);
        $school->setDescription($data['description']);
        $school->setCreatedAt($data['created_at']);
        $school->setUpdatedAt($data['updated_at']);
        $school->setUrl($data['url']);
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
            $schools[] = $this->map($item);
        }
        return $schools;
    }
}