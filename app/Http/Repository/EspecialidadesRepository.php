<?php
namespace App\Http\Repository;

use App\Http\Entity\EspecialidadesEntity;
use App\Http\Mapper\EspecialidadesMapper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EspecialidadesRepository
{
    /**
     * @param array $data
     * @return array
     */
    public function getAll($page=1, $search="")
    {
        $especialidadesMapper = new EspecialidadesMapper();
        $especialidadesList = [];
        $page = ($page-1)*10;
        if(!empty($search)) {
            $especialidades = DB::table('especialidades')
                ->where('name', 'like', '%'.$search.'%')
                ->orderBy('olimpico', 'desc')
                ->skip($page)->take(10)->get();
        } else {
            $especialidades = DB::table('especialidades')
                ->orderBy('olimpico', 'desc')
                ->skip($page)->take(10)->get();
        }
        if(!empty($especialidades)) {
            $especialidadesList = $especialidadesMapper->mapCollection($especialidades->toArray());
        }

        return $especialidadesList;
    }
    
    /**
     * @param array $filter
     * @return EspecialidadesEntity
     */
    public function getOne($id){
        $especialidadesMapper = new EspecialidadesMapper();
        $especialidades = DB::table('especialidades')
            ->where('id', $id)
            ->get();
        $especialidades = $especialidadesMapper->map(get_object_vars($especialidades[0]));
        return $especialidades;
    }
    
    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request){
        $especialidadesMapper = new EspecialidadesMapper();
        $data = $request->all();
        $especialidades = $especialidadesMapper->map($data);
        $id = DB::table('especialidades')
            ->insertGetId(
                [
                    'name' => $especialidades->getName(),
                    'alias' => $especialidades->getAlias(),
                    'icon' => $especialidades->getIcon(),
                    'current_season' => $especialidades->getCurrentSeason(),
                    'pos' => $especialidades->getPos(),
                    'description' => $especialidades->getDescription(),
                    'olimpico' => $especialidades->getOlimpico(),
                ]
            );
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function update(Request $request){
        $especialidadesMapper = new EspecialidadesMapper();
        $data = $request->all();
        $especialidades = $especialidadesMapper->map($data);
        $id = DB::table('especialidades')
            ->where('id', $especialidades->getId())
            ->update(
                [
                    'name' => $especialidades->getName(),
                    'alias' => $especialidades->getAlias(),
                    'icon' => $especialidades->getIcon(),
                    'current_season' => $especialidades->getCurrentSeason(),
                    'pos' => $especialidades->getPos(),
                    'description' => $especialidades->getDescription(),
                    'olimpico' => $especialidades->getOlimpico(),
                ]
            );
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function delete($id){
        $id = DB::table('especialidades')
            ->where('id', $id)
            ->delete();
        return $id;
    }
}