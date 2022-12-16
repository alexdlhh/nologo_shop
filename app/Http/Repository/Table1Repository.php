<?php

namespace App\Http\Repository;

use App\Http\Entity\RFEGTitleEntity;
use App\Http\Mapper\RFEGTitleMapper;
use App\Http\Mapper\Table1Mapper;
use App\Http\Entity\Table1Entity;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Table1Repository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAll($page=1, $search = '')
    {
        $table1Mapper = new Table1Mapper();
        $table1List = [];

        $page = ($page-1)*10;
        if(!empty($search)) {
            $table1 = DB::table('rfeg_table1')
                ->where('name', 'like', '%'.$search.'%')
                ->orderBy('name', 'desc')
                ->skip($page)->take(10)->get();
        } else {
            $table1 = DB::table('rfeg_table1')
                ->orderBy('name', 'desc')
                ->skip($page)->take(10)->get();
        }
        if(!empty($table1->toArray())) {
            $table1List = $table1Mapper->mapCollection($table1->toArray());
        }
        return $table1List;
    }

    /**
     * getById
     * @param int $id
     * @return array
     */
    public function getById(int $id){
        $table1Mapper = new Table1Mapper();
        $table1 = DB::table('rfeg_table1')
            ->where('id', $id)
            ->first();
        $table1 = $table1Mapper->map(get_object_vars($table1));
        return $table1;
    }

    /**
     * save if id is 0 we do insewr else we do update
     */
    public function save($data,$file_url=''){
        $table1Mapper = new Table1Mapper();
        $table1 = $table1Mapper->map($data);
        if($table1->getId() == 0){
            $id = DB::table('rfeg_table1')->insertGetId(
                [
                    'documento' => $table1->getDocumento(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'download_pdf' => $file_url,
                    'rfeg_title' => $table1->getRfeg_title(),
                    'especialidad' => empty($table1->getEspecialidad()) ? 0 : $table1->getEspecialidad(),
                ]
            );
            $table1->setId($id);
        }else{
            if($file_url == ''){
                DB::table('rfeg_table1')
                ->where('id', $table1->getId())
                ->update(
                    [
                        'documento' => $table1->getDocumento(),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                );
            }else{
                DB::table('rfeg_table1')
                ->where('id', $table1->getId())
                ->update(
                    [
                        'documento' => $table1->getDocumento(),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'download_pdf' => $file_url,
                    ]
                );
            }
            
        }
        return $table1;
    }

    /**
     * delete
     * @param int $id
     * @return array
     */
    public function delete(int $id){
        $table1Mapper = new Table1Mapper();
        $table1 = DB::table('rfeg_table1')
            ->where('id', $id)
            ->delete();
        return $table1;
    }

    /**
     * getbyRfegTitle
     */
    public function getbyRfegTitle(int $id){
        $table1Mapper = new Table1Mapper();
        $table1 = DB::table('rfeg_table1')
            ->where('rfeg_title', $id)
            ->orderBy('order', 'desc')
            ->get();
        $table1 = $table1Mapper->mapCollection($table1->toArray());
        return $table1;
    }

    /**
     * getbyRfegTitleAndEspeciality
     */
    public function getbyRfegTitleAndEspeciality(int $id, int $especialidad){
        $table1Mapper = new Table1Mapper();
        $table1 = DB::table('rfeg_table1')
            ->where('rfeg_title', $id)
            ->where('especialidad', $especialidad)
            ->orderBy('order', 'desc')
            ->get();
        $table1 = $table1Mapper->mapCollection($table1->toArray());
        return $table1;
    }
}
