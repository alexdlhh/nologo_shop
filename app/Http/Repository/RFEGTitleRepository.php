<?php

namespace App\Http\Repository;

use App\Http\Entity\RFEGTitleEntity;
use App\Http\Mapper\RFEGTitleMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RFEGTitleRepository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAll($page=1, $search = '')
    {
        $rfegTitleMapper = new RFEGTitleMapper();
        $rfegTitleList = [];

        $page = ($page-1)*10;
        if(!empty($search)) {
            $rfegTitle = DB::table('rfeg_title')
                ->where('name', 'like', '%'.$search.'%')
                ->orderBy('name', 'desc')
                ->skip($page)->take(10)->get();
        } else {
            $rfegTitle = DB::table('rfeg_title')
                ->orderBy('name', 'desc')
                ->skip($page)->take(10)->get();
        }
        if(!empty($rfegTitle->toArray())) {
            $rfegTitleList = $rfegTitleMapper->mapCollection($rfegTitle->toArray());
        }
        return $rfegTitleList;
    }

    /**
     * getById
     * @param int $id
     * @return array
     */
    public function getById(int $id){
        $rfegTitleMapper = new RFEGTitleMapper();
        $rfegTitle = DB::table('rfeg_title')
            ->where('id', $id)
            ->first();
        $rfegTitle = $rfegTitleMapper->map(get_object_vars($rfegTitle));
        return $rfegTitle;
    }

    /**
     * getbyType
     */
    public function getByType($type){
        $rfegTitleMapper = new RFEGTitleMapper();
        $rfegTitle = DB::table('rfeg_title')
            ->where('type', $type)
            ->get();
        $rfegTitle = $rfegTitleMapper->mapCollection($rfegTitle->toArray());
        return $rfegTitle;
    }

    /**
     * save if id is 0 we do insewr else we do update
     */
    public function save($data){
        $rfegTitleMapper = new RFEGTitleMapper();
        $rfegTitle = $rfegTitleMapper->map($data);
        if($rfegTitle->getId() == 0) {
            $rfegTitle->setId(DB::table('rfeg_title')->insertGetId($rfegTitle->toArray()));
        } else {
            DB::table('rfeg_title')
                ->where('id', $rfegTitle->getId())
                ->update($rfegTitle->toArray());
        }
        return $rfegTitle;
    }

    /**
     * delete
     * @param int $id
     * @return array
     */
    public function delete(int $id){
        $rfegTitleMapper = new RFEGTitleMapper();
        $rfegTitle = DB::table('rfeg_title')
            ->where('id', $id)
            ->delete();
        return $rfegTitle;
    }

    /**
     * Get static ids, if section is cursos we get ids in 29,30,31,32,33, if is normativa 24,25,26,27,28
     */
    public function getStatic($section){
        if($section == 'rfeg') {
            $rfegTitle = DB::table('rfeg_title')
                ->where('type', 'courserfeg')
                ->get();
        } else {
            $rfegTitle = DB::table('rfeg_title')
                ->where('type', 'coursesffaa')
                ->get();
        }
        $rfegTitleMapper = new RFEGTitleMapper();
        $rfegTitle = $rfegTitleMapper->mapCollection($rfegTitle->toArray());
        return $rfegTitle;
    }

    /**
     * getbyEspecialidad
     * la tabla rfeg_table1 tiene un campo rfeg_title que es el id de rfeg_title
     * tenemos que evitar repetidos
     */
    public function getbyEspecialidad($especialidad){
        $rfegTitleMapper = new RFEGTitleMapper();
        $rfegTitle = DB::table('rfeg_title')
            ->join('rfeg_table1', 'rfeg_title.id', '=', 'rfeg_table1.rfeg_title')
            ->where('rfeg_table1.especialidad', $especialidad)
            ->select('rfeg_title.*')
            ->distinct()
            ->get();
        $rfegTitle = $rfegTitleMapper->mapCollection($rfegTitle->toArray());
        return $rfegTitle;
    }


    /**
     * Buscamos en todos los campos de rfeg_title
     */
    public function search($search){
        $rfegTitleMapper = new RFEGTitleMapper();
        $rfegTitle = DB::table('rfeg_title')
            ->where('name', 'like', '%'.$search.'%')
            ->orWhere('type', 'like', '%'.$search.'%')
            ->get();
        $rfegTitle = $rfegTitleMapper->mapCollection($rfegTitle->toArray());
        return $rfegTitle;
    }
}