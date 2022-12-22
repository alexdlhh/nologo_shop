<?php

namespace App\Http\Repository;

use App\Http\Entity\RFEGTitleEntity;
use App\Http\Mapper\RFEGTitleMapper;
use App\Http\Mapper\Table7Mapper;
use App\Http\Entity\Table7Entity;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Table7Repository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAll($page=1, $search = '')
    {
        $table7Mapper = new Table7Mapper();
        $table7List = [];

        $page = ($page-1)*10;
        if(!empty($search)) {
            $table7 = DB::table('rfeg_table7')
                ->where('titulo', 'like', '%'.$search.'%')
                ->orderBy('titulo', 'desc')
                ->skip($page)->take(10)->get();
        } else {
            $table7 = DB::table('rfeg_table7')
                ->orderBy('titulo', 'desc')
                ->skip($page)->take(10)->get();
        }
        if(!empty($table7->toArray())) {
            $table7List = $table7Mapper->mapCollection($table7->toArray());
        }
        return $table7List;
    }

    /**
     * getById
     * @param int $id
     * @return array
     */
    public function getById(int $id){
        $table7Mapper = new Table7Mapper();
        $table7 = DB::table('rfeg_table7')
            ->where('id', $id)
            ->first();
        $table7 = $table7Mapper->map(get_object_vars($table7));
        return $table7;
    }

    /**
     * save if id is 0 we do insewr else we do update
     */
    public function save($data,$image){
        $table7Mapper = new Table7Mapper();
        $table7 = $table7Mapper->map($data);
        if($table7->getId() == 0){
            $id = DB::table('rfeg_table7')->insertGetId(
                [
                    'image' => $image,
                    'titulo' => $table7->getTitulo(),
                    'direccion' => $table7->getDireccion(),
                    'phone' => $table7->getPhone(),
                    'fax' => $table7->getFax(),
                    'web' => $table7->getWeb(),
                    'email' => $table7->getEmail(),
                    'rfeg_title' => $table7->getRfegTitle()
                ]
            );
            $table7->setId($id);
        } else {
            DB::table('rfeg_table7')
                ->where('id', $table7->getId())
                ->update(
                    [
                        'titulo' => $table7->getTitulo(),
                        'direccion' => $table7->getDireccion(),
                        'phone' => $table7->getPhone(),
                        'fax' => $table7->getFax(),
                        'web' => $table7->getWeb(),
                        'email' => $table7->getEmail(),
                        'rfeg_title' => $table7->getRfegTitle()
                    ]
                );
            if(!empty($image)) {
                DB::table('rfeg_table7')
                    ->where('id', $table7->getId())
                    ->update(
                        [
                            'image' => $image
                        ]
                    );
            }
        }
        return $table7;
    }

    /**
     * delete
     * @param int $id
     * @return array
     */
    public function delete(int $id){
        DB::table('rfeg_table7')->where('id', '=', $id)->delete();
    }

    /**
     * getbyRfegTitle
     */
    public function getbyRfegTitle(int $id){
        $table7Mapper = new Table7Mapper();
        $table7 = DB::table('rfeg_table7')
            ->where('rfeg_title', $id)
            ->get();
        $table7 = $table7Mapper->mapCollection($table7->toArray());
        return $table7;
    }

    /**
     * Buscamos en todos los campos de rfeg_table7
     */
    public function search($search){
        $table7Mapper = new Table7Mapper();
        $table7 = DB::table('rfeg_table7')
            ->where('titulo', 'like', '%'.$search.'%')
            ->orWhere('direccion', 'like', '%'.$search.'%')
            ->orWhere('phone', 'like', '%'.$search.'%')
            ->orWhere('fax', 'like', '%'.$search.'%')
            ->orWhere('web', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->get();
        $table7 = $table7Mapper->mapCollection($table7->toArray());
        return $table7;
    }
}