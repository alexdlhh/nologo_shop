<?php

namespace App\Http\Repository;

use App\Http\Entity\RFEGEntity;
use App\Http\Mapper\RFEGMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RFEGRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $rFEGMapper = new RFEGMapper();
    
        if(!empty($filter)) {
            $rFEG = DB::table('r_f_e_g')
                ->where($filter)
                ->get();
        } else {
            $rFEG = DB::table('r_f_e_g')
                ->get();
        }
        
        $rFEGList = $rFEGMapper->mapCollection($rFEG);
        return $rFEGList;
    }
    
    /**
     * @param array $filter
     * @return RFEGEntity
     */
    public function getOne($filter = []){
        $rFEGMapper = new RFEGMapper();
        $rFEG = DB::table('r_f_e_g')
            ->where($filter)
            ->first();
        $rFEG = $rFEGMapper->map($rFEG);
        return $rFEG;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $rFEGMapper = new RFEGMapper();
        $rFEG = $rFEGMapper->map($request->all());
        $rFEG->save();
        return true;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function update(Request $request){
        $rFEGMapper = new RFEGMapper();
        $rFEG = $rFEGMapper->map($request->all());
        $rFEG->save();
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function delete($filter = []){
        $rFEGMapper = new RFEGMapper();
        $rFEG = $rFEGMapper->map($filter);
        $rFEG->delete();
        return true;
    }


    /**
     * Obtenemos rfeg_tables por type y sus rfeg_content asociados si existen
     * @param string $type
     * @return array
     */
    public function getRFEGTablesByType($type = ''){
        $rFEGMapper = new RFEGMapper();
        $rFEGTables = DB::table('rfeg_tables')
            ->where('type', $type)
            ->get();
        return $rFEGTables;
    }

    /**
     * Obtenemos rfeg_content por rfeg_table_id
     * @param int $rfeg_table_id
     * @return array
     */
    public function getRFEGContentByRFEGTableId($rfeg_table_id = 0){
        $rFEGMapper = new RFEGMapper();
        $rFEGContent = DB::table('rfeg_content')
            ->where('rfeg_table', $rfeg_table_id)
            ->get();
        return $rFEGContent;
    }
}