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
    public function getById($id){
        $rsMapper = new RSMapper();
        $rs = DB::table('social')
            ->where('id', $id)
            ->first();
        $rs = $rsMapper->map(get_object_vars($rs));
        return $rs;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request, $image_url=''){
        $rsMapper = new RSMapper();
        $rs = $rsMapper->map($request->all());
        $id = DB::table('social')
            ->insertGetId([
                'name' => $rs->getName(),
                'icon' => $image_url,
                'url' => $rs->getUrl(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return $id;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request,$image_url=''){
        $rsMapper = new RSMapper();
        $rs = $rsMapper->map($request->all());
        if($image_url!=''){
            $id = DB::table('social')
                ->where('id', $rs->getId())
                ->update([
                    'name' => $rs->getName(),
                    'icon' => $image_url,
                    'url' => $rs->getUrl(),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
        }else{
            $id = DB::table('social')
                ->where('id', $rs->getId())
                ->update([
                    'name' => $rs->getName(),
                    'url' => $rs->getUrl(),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
        }
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