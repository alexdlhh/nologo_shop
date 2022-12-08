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
        !empty($data['id']) ? $employee->setId($data['id']) : null;
        !empty($data['name']) ? $employee->setName($data['name']) : null;
        !empty($data['email']) ? $employee->setEmail($data['email']) : null;
        !empty($data['phone']) ? $employee->setPhone($data['phone']) : null;
        !empty($data['charge']) ? $employee->setCharge($data['charge']) : null;
        !empty($data['twitter']) ? $employee->setTwitter($data['twitter']) : null;
        !empty($data['featuredImage']) ? $employee->setFeaturedImage($data['featuredImage']) : null;
        !empty($data['rfeg_table']) ? $employee->setRfegTable($data['rfeg_table']) : null;

        return $employee;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection($data): array
    {
        $employees = [];
        foreach ($data as $item) {
            if(is_array($item)) {
                $employees[] = $this->map($item);
            }else{
                $employees[] = $this->map(get_object_vars($item));
            }
        }
        return $employees;
    }
}