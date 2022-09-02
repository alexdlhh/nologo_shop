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
    public function getAll($page=1, $search='')
    {
        $employeeMapper = new EmployeeMapper();
        $page = ($page-1)*10;
        if(!empty($search)) {
            $employees = DB::table('employee')
                ->where('search', 'like', '%'.$search.'%')
                ->skip($page)->take(10)->get();
        } else {
            $employees = DB::table('employee')
                ->skip($page)->take(10)->get();
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
        $employee = DB::table('employee')
            ->where($filter)
            ->first();
        $employee = $employeeMapper->map(get_object_vars($employee));
        return $employee;
    }
    
    /**
     * @param array $data
     * @return int $id
     */
    public function create(Request $request, string $image){
        $employeeMapper = new EmployeeMapper();
        $employee = $employeeMapper->map($request->all());
        $id = DB::table('employee')->insertGetId(
            [
                'name' => $employee->getName(),
                'email' => $employee->getEmail(),
                'phone' => $employee->getPhone(),
                'charge' => $employee->getCharge(),
                'twitter' => $employee->getTwitter(),
                'featuredImage' => $image
            ]
        );
        return $id;
    }
    
    /**
     * @param array $data
     * @return int $id
     */
    public function update(Request $request, string $image){
        $employeeMapper = new EmployeeMapper();
        $employee = $employeeMapper->map($request->all());
        $id = DB::table('employee')
            ->where('id', $employee->getId())
            ->update(
                [
                    'name' => $employee->getName(),
                    'email' => $employee->getEmail(),
                    'phone' => $employee->getPhone(),
                    'charge' => $employee->getCharge(),
                    'twitter' => $employee->getTwitter(),
                    'featuredImage' => $image
                ]
            );
        return $id;
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

    /**
     * Count total of employees
     */
    public function getTotal($search)
    {
        if(!empty($search)) {
            $total = DB::table('employee')
                ->where('name', 'like', '%'.$search.'%')
                ->count();
        } else {
            $total = DB::table('employee')
                ->count();
        }
        return $total;
    }
}