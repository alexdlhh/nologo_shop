<?php

namespace App\Http\Repository;

use App\Http\Entity\RSEntity;
use App\Http\Mapper\RSMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RSRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $rsMapper = new RSMapper();
    
        if(!empty($filter)) {
            $rs = DB::table('rs')
                ->where($filter)
                ->get();
        } else {
            $rs = DB::table('rs')
                ->get();
        }
        
        $rsList = $rsMapper->mapCollection($rs);
        return $rsList;
    }
    
    /**
     * @param array $filter
     * @return RSEntity
     */
    public function getOne($filter = []){
        $rsMapper = new RSMapper();
        $rs = DB::table('rs')
            ->where($filter)
            ->first();
        $rs = $rsMapper->map($rs);
        return $rs;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $rsMapper = new RSMapper();
        $rs = $rsMapper->map($request->all());
        $rs->save();
        return true;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request){
        $rsMapper = new RSMapper();
        $rs = $rsMapper->map($request->all());
        $rs->save();
        return true;
    }

    /**
     * @param array $data
     */
    public function delete(Request $request){
        $rsMapper = new RSMapper();
        $rs = $rsMapper->map($request->all());
        $rs->delete();
    }

}