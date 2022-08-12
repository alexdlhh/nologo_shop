<?php

namespace App\Http\Mapper;

use App\Http\Entity\EmployeeEntity;

class EmployeeMapper
{
    /**
     * @param array $data
     * @return EmployeeEntity
     */
    public function map(array $data): EmployeeEntity
    {
        $employee = new EmployeeEntity();
        $employee->setId($data['id']);
        $employee->setName($data['name']);
        $employee->setEmail($data['email']);
        $employee->setPhone($data['phone']);
        $employee->setCharge($data['charge']);
        $employee->setTwitter($data['twitter']);
        $employee->setFeaturedImage($data['featured_image']);
        return $employee;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection(array $data): array
    {
        $employees = [];
        foreach ($data as $item) {
            $employees[] = $this->map($item);
        }
        return $employees;
    }
}