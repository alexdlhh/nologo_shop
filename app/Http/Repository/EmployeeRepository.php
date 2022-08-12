<?php

namespace App\Http\Repository;

use App\Http\Entity\EmployeeEntity;
use App\Http\Mapper\EmployeeMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $employeeMapper = new EmployeeMapper();
    
        if(!empty($filter)) {
            $employees = DB::table('employees')
                ->where($filter)
                ->get();
        } else {
            $employees = DB::table('employees')
                ->get();
        }
        
        $employeeList = $employeeMapper->mapCollection($employees);
        return $employeeList;
    }
    
    /**
     * @param array $filter
     * @return EmployeeEntity
     */
    public function getOne($filter = []){
        $employeeMapper = new EmployeeMapper();
        $employee = DB::table('employees')
            ->where($filter)
            ->first();
        $employee = $employeeMapper->map($employee);
        return $employee;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $employeeMapper = new EmployeeMapper();
        $employee = $employeeMapper->map($request->all());
        $employee->save();
        return true;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request){
        $employeeMapper = new EmployeeMapper();
        $employee = $employeeMapper->map($request->all());
        $employee->save();
        return true;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function delete(Request $request){
        $employeeMapper = new EmployeeMapper();
        $employee = $employeeMapper->map($request->all());
        $employee->delete();
        return true;
    }
}