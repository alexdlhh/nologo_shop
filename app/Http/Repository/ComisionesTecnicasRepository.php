<?php

namespace App\Http\Repository;

use App\Http\Entity\ComisionesTecnicasEntity;
use App\Http\Mapper\ComisionesTecnicasMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComisionesTecnicasRepository
{

    public function getByEspecialidad($especialidad){
        $comisionesTecnicasMapper = new ComisionesTecnicasMapper();
        $comisionesTecnicas = DB::table('comisiones_tecnicas')
            ->where('especialidad', $especialidad)
            ->orderBy('order', 'asc')
            ->get();
        return $comisionesTecnicasMapper->mapCollection($comisionesTecnicas);
    }

    public function postReorder($request){
        $status = 0;
        $comisiones_tecnicas = $request->all()['comisiones_tecnicas'];
        foreach($comisiones_tecnicas as $comision){
            $status = DB::table('comisiones_tecnicas')
                ->where('id', $comision['id'])
                ->update(
                    [
                        'order' => $comision['order'],
                    ]
                );
        }
        return $status;
    }

    public function postSave($request,$image_url){
        $comisionesTecnicasMapper = new ComisionesTecnicasMapper();
        $data = $request->all();
        $comisionesTecnicas = $comisionesTecnicasMapper->map($data);
        $id = DB::table('comisiones_tecnicas')
            ->insertGetId(
                [
                    'name' => $comisionesTecnicas->getName(),
                    'posicion' => $comisionesTecnicas->getPosicion(),                 
                    'especialidad' => $comisionesTecnicas->getEspecialidad(),
                ]
            );
        if($image_url != ""){
            $id = DB::table('comisiones_tecnicas')
                ->where('id', $id)
                ->update(
                    [
                        'image' => $image_url,
                    ]
                );
        }
        return $id;
    }

    public function postTeamNew($request,$image_url){
        $comisionesTecnicasMapper = new ComisionesTecnicasMapper();
        $data = $request->all();
        $comisionesTecnicas = $comisionesTecnicasMapper->map($data);
        $id = DB::table('comisiones_tecnicas')
            ->insertGetId(
                [
                    'name' => $comisionesTecnicas->getName(),
                    'posicion' => $comisionesTecnicas->getPosicion(),
                    'image' => $image_url,
                    'especialidad' => $comisionesTecnicas->getEspecialidad(),
                ]
            );
        return $id;
    }

    public function postTeamEdit($request,$image_url){
        $comisionesTecnicasMapper = new ComisionesTecnicasMapper();
        $data = $request->all();
        $comisionesTecnicas = $comisionesTecnicasMapper->map($data);
        $id = DB::table('comisiones_tecnicas')
            ->where('id', $comisionesTecnicas->getId())
            ->update(
                [
                    'name' => $comisionesTecnicas->getName(),
                    'posicion' => $comisionesTecnicas->getPosicion(),
                    'order' => $comisionesTecnicas->getOrder(),                    
                    'especialidad' => $comisionesTecnicas->getEspecialidad(),
                ]
            );
        if($image_url != ""){
            $id = DB::table('comisiones_tecnicas')
                ->where('id', $comisionesTecnicas->getId())
                ->update(
                    [
                        'image' => $image_url,
                    ]
                );
        }

        return $id;
    }

    public function postTeamDelete($id){
        $id = DB::table('comisiones_tecnicas')
            ->where('id', $id)
            ->delete();
        return $id;
    }
}