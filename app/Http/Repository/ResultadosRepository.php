<?php

namespace App\Http\Repository;

use App\Http\Entity\ResultadosEntity;
use App\Http\Entity\ResultadosFileEntity;
use App\Http\Mapper\ResultadosMapper;
use App\Http\Mapper\ResultadosFileMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResultadosRepository{
    public function getByEspecialidad($especialidad)
    {
        $return = [];
        $resultados = DB::table('resultados')
            ->select('resultados.id', 'resultados.especialidad', 'resultados.name', 'resultados.fecha_inicio', 'resultados.fecha_fin', 'resultados.lugar')
            ->where('resultados.especialidad', '=', $especialidad)
            ->get();
        $resultadosMapper = new ResultadosMapper();
        $resultados = $resultadosMapper->mapCollection($resultados);
        foreach($resultados as $resultado){
            $resultadosFile = DB::table('resultados_file')
                ->select('resultados_file.id', 'resultados_file.id_resultados', 'resultados_file.nombre', 'resultados_file.documento')
                ->where('resultados_file.id_resultados', '=', $resultado->getId())
                ->get();
            $resultadosFileMapper = new ResultadosFileMapper();
            $resultadosFile = $resultadosFileMapper->mapCollection($resultadosFile);
            if(empty($return['resultados'][$resultado->getId()]['data'])){
                $return['resultados'][$resultado->getId()]['data'] = $resultado;
            }
            $return['resultados'][$resultado->getId()]['documentos'] = $resultadosFile;
        }
        return $return;
    }

    public function postSave($request){
        $data = $request->all();
        $resultadosEntity = new ResultadosEntity();
        $resultadosEntity->setEspecialidad($data['especialidad']);
        $resultadosEntity->setName($data['name']);
        $resultadosEntity->setFechaInicio($data['fecha_inicio']);
        $resultadosEntity->setFechaFin($data['fecha_fin']);
        $resultadosEntity->setLugar($data['lugar']);
        if(empty($data['id'])){
            $id = DB::table('resultados')->insertGetId([
                'especialidad' => $resultadosEntity->getEspecialidad(),
                'name' => $resultadosEntity->getName(),
                'fecha_inicio' => $resultadosEntity->getFechaInicio(),
                'fecha_fin' => $resultadosEntity->getFechaFin(),
                'lugar' => $resultadosEntity->getLugar()
            ]);
        }else{
            $id = $data['id'];
            DB::table('resultados')
                ->where('id', $id)
                ->update([
                    'especialidad' => $resultadosEntity->getEspecialidad(),
                    'name' => $resultadosEntity->getName(),
                    'fecha_inicio' => $resultadosEntity->getFechaInicio(),
                    'fecha_fin' => $resultadosEntity->getFechaFin(),
                    'lugar' => $resultadosEntity->getLugar()
                ]);
        }

        return $id;
    }

    public function postFileSave($request,$archivo_url)
    {
        $data = $request->all();
        $resultadosFileEntity = new ResultadosFileEntity();
        $resultadosFileEntity->setNombre($data['nombre']);
        $resultadosFileEntity->setDocumento($archivo_url);
        if(empty($data['id'])){
            $id = DB::table('resultados_file')->insertGetId([            
                'nombre' => $resultadosFileEntity->getNombre(),            
            ]);
        }else{
            $id = $data['id'];
            DB::table('resultados_file')
                ->where('id', $data['id'])
                ->update([
                    'nombre' => $resultadosFileEntity->getNombre()
                ]);
        }
        if(!empty($data['id_resultados'])){
            DB::table('resultados_file')
                ->where('id', $id)
                ->update([
                    'id_resultados' => $data['id_resultados']
                ]);
        }
        if(!empty($archivo_url)){
            DB::table('resultados_file')
                ->where('id', $id)
                ->update([
                    'documento' => $archivo_url
                ]);
        }
        return $id;
    }

    public function postDelete($id)
    {
        DB::table('resultados')->where('id', '=', $id)->delete();
        DB::table('resultados_file')->where('id_resultados', '=', $id)->delete();
    }

    public function postFileDelete($id)
    {
        DB::table('resultados_file')->where('id', '=', $id)->delete();
    }

    /**
     * Buscamos en todos los campos de la tabla resultados
     * @param $search
     * @return array
     */
    public function search($search){
        $resultados = DB::table('resultados')
            ->where('resultados.name', 'like', '%'.$search.'%')
            ->orWhere('resultados.lugar', 'like', '%'.$search.'%')
            ->get();
        $resultadosMapper = new ResultadosMapper();
        $resultados = $resultadosMapper->mapCollection($resultados);
        return $resultados;
    }

    /**
     * Buscamos en todos los campos de la tabla resultados_file
     * @param $search
     * @return array
     */
    public function searchFile($search){
        $resultadosFile = DB::table('resultados_file')
            ->where('resultados_file.nombre', 'like', '%'.$search.'%')
            ->get();
        $resultadosFileMapper = new ResultadosFileMapper();
        $resultadosFile = $resultadosFileMapper->mapCollection($resultadosFile);
        return $resultadosFile;
    }
}