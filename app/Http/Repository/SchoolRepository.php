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
    public function getAll($page=1,$search='')
    {
        $schoolMapper = new SchoolMapper();
        $init = $page==1?0:($page-1)*10;
        if(!empty($search)) {
            $schools = DB::table('school')
                ->where('name', 'like', '%'.$search.'%')
                ->skip($init)->take(10)->get();
        } else {
            $schools = DB::table('school')
                ->get();
        }
        
        $schoolList = $schoolMapper->mapCollection($schools);
        return $schoolList;
    }
    
    /**
     * @param array $filter
     * @return SchoolEntity
     */
    public function getOne($id){
        $schoolMapper = new SchoolMapper();
        $school = DB::table('schools')
            ->where('id', $id)
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

    /**
     * @param array $data
     * @return bool
     */
    public function updateStatus(Request $request){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $school->save();
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function getTotalSchools(){
        $schools = DB::table('school')
            ->count();
        return $schools;
    }

}