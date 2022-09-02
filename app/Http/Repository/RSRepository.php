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
    public function getAll()
    {
        $rsMapper = new RSMapper();
    
        $rs = DB::table('social')
                ->get();
        
        
        $rsList = $rsMapper->mapCollection($rs);
        return $rsList;
    }
    
    /**
     * @param array $filter
     * @return RSEntity
     */
    public function getOne($id){
        $rsMapper = new RSMapper();
        $rs = DB::table('social')
            ->where('id', $id)
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
        $id = DB::table('social')
            ->insertGetId([
                'name' => $rs->getName(),
                'description' => $rs->getDescription(),
                'icon' => $rs->getIcon(),
                'url' => $rs->getUrl(),
                'created_at' => $rs->getCreatedAt(),
                'updated_at' => $rs->getUpdatedAt(),
            ]);
        return $id;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request){
        $rsMapper = new RSMapper();
        $rs = $rsMapper->map($request->all());
        $id = DB::table('social')
            ->where('id', $rs->getId())
            ->update([
                'name' => $rs->getName(),
                'description' => $rs->getDescription(),
                'icon' => $rs->getIcon(),
                'url' => $rs->getUrl(),
                'created_at' => $rs->getCreatedAt(),
                'updated_at' => $rs->getUpdatedAt(),
            ]);
        return $id;
    }

    /**
     * @param array $data
     */
    public function delete(Request $request){
        $rsMapper = new RSMapper();
        $rs = $rsMapper->map($request->all());
        DB::table('social')
            ->where('id', $rs->getId())
            ->delete();
    }

}