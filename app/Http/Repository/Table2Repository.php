<?php

namespace App\Http\Repository;

use App\Http\Entity\RFEGTitleEntity;
use App\Http\Mapper\RFEGTitleMapper;
use App\Http\Mapper\Table2Mapper;
use App\Http\Entity\Table2Entity;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Table2Repository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAll($page=1, $search = '')
    {
        $table2Mapper = new Table2Mapper();
        $table2List = [];

        $page = ($page-1)*10;
        if(!empty($search)) {
            $table2 = DB::table('rfeg_table2')
                ->where('nombre', 'like', '%'.$search.'%')
                ->orderBy('nombre', 'desc')
                ->skip($page)->take(10)->get();
        } else {
            $table2 = DB::table('rfeg_table2')
                ->orderBy('nombre', 'desc')
                ->skip($page)->take(10)->get();
        }
        if(!empty($table2->toArray())) {
            $table2List = $table2Mapper->mapCollection($table2->toArray());
        }
        return $table2List;
    }

    /**
     * getById
     * @param int $id
     * @return array
     */
    public function getById(int $id){
        $table2Mapper = new Table2Mapper();
        $table2 = DB::table('rfeg_table2')
            ->where('id', $id)
            ->first();
        $table2 = $table2Mapper->map(get_object_vars($table2));
        return $table2;
    }

    /**
     * save if id is 0 we do insewr else we do update
     */
    public function save($data){
        $table2Mapper = new Table2Mapper();
        $table2 = $table2Mapper->map($data);
        if($table2->getId() == 0){
            $id = DB::table('rfeg_table2')->insertGetId(
                [
                    'nombre' => $table2->getNombre(),
                    'cargo' => $table2->getCargo(),
                    'especialidad' => $table2->getEspecialidad(),
                    'rfeg_title' => $table2->getRfegTitle()
                ]
            );
            $table2->setId($id);
        } else {
            DB::table('rfeg_table2')
                ->where('id', $table2->getId())
                ->update(
                    [
                        'nombre' => $table2->getNombre(),
                        'cargo' => $table2->getCargo(),
                        'especialidad' => $table2->getEspecialidad(),
                        'rfeg_title' => $table2->getRfegTitle()
                    ]
                );
        }
        return $table2;
    }

    /**
     * delete
     * @param int $id
     * @return array
     */
    public function delete(int $id){
        DB::table('rfeg_table2')->where('id', '=', $id)->delete();
    }

    /**
     * getbyRfegTitle
     */
    public function getbyRfegTitle(int $id){
        $table2Mapper = new Table2Mapper();
        $table2 = DB::table('rfeg_table2')
            ->where('rfeg_title', $id)
            ->orderBy('order', 'desc')
            ->get();
        $table2 = $table2Mapper->mapCollection($table2->toArray());
        return $table2;
    }
}