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
     * @return bool
     */
    public function create(Request $request, String $archivo){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $id = DB::table('normativa')->insertGetId([
            'documento' => $school->getDocumento(),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'download_pdf' => $archivo,
            'type' => $school->getType(),
            'active' => $school->getActive(),
        ]);
        return $id;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request, String $archivo){
        $schoolMapper = new SchoolMapper();
        $school = $schoolMapper->map($request->all());
        $id = DB::table('normativa')->where('id', $school->getId())->update([
            'documento' => $school->getDocumento(),
            'updated_at' => date('Y-m-d'),            
            'type' => $school->getType(),
            'active' => $school->getActive(),
        ]);

        if($archivo != ''){
            $id = DB::table('normativa')->where('id', $school->getId())->update([
                'download_pdf' => $archivo,
            ]);
        }
        return $id;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id){
        $id = DB::table('normativa')->where('id', $id)->delete();
        return true;
    }

    /**
     * getNormativas
     */
    public function getNormativas($type=''){
        $schoolMapper = new SchoolMapper();
        if($type==''){
            $normativas = DB::table('normativa')
                ->where('active', '1')
                ->get();
        }else{
            $normativas = DB::table('normativa')
                ->where('type', $type)
                ->where('active', '1')
                ->get();
        }
        $normativas = $schoolMapper->mapCollection($normativas->toArray());
        return $normativas;
    }

    /**
     * getNormativas
     */
    public function getNormativasAdmin($type=''){
        $schoolMapper = new SchoolMapper();
        if($type==''){
            $normativas = DB::table('normativa')
                ->get();
        }else{
            $normativas = DB::table('normativa')
                ->where('type', $type)
                ->get();
        }
        $normativas = $schoolMapper->mapCollection($normativas->toArray());
        return $normativas;
    }

}