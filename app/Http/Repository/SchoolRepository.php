<?php

namespace App\Http\Repository;

use App\Http\Entity\SchoolEntity;
use App\Http\Mapper\SchoolMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SchoolRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $schoolMapper = new SchoolMapper();
    
        if(!empty($filter)) {
            $schools = DB::table('schools')
                ->where($filter)
                ->get();
        } else {
            $schools = DB::table('schools')
                ->get();
        }
        
        $schoolList = $schoolMapper->mapCollection($schools);
        return $schoolList;
    }
    
    /**
     * @param array $filter
     * @return SchoolEntity
     */
    public function getOne($filter = []){
        $schoolMapper = new SchoolMapper();
        $school = DB::table('schools')
            ->where($filter)
            ->first();
        $school = $schoolMapper->map($school);
        return $school;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $school->save();
        return true;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $school->save();
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function delete(Request $request){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $school->delete();
        return true;
    }

}