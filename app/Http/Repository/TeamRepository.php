<?php
namespace App\Http\Repository;

use App\Http\Entity\TeamEntity;
use App\Http\Mapper\TeamMapper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamRepository{
    /**
     * @param int $especialidad
     * @param int $year
     * @param string $search
     * @return array
     */
    public function getAll($especialidad=1, $year, $search=""){
        $teamMapper = new TeamMapper();
        $teamList = [];
        if(!empty($search)) {
            $teamList = DB::table('team')
                ->where('name', 'like', '%'.$search.'%')
                ->where('especialidad', $especialidad)
                ->where('year', $year)
                ->orderBy('olimpico', 'desc')
                ->get();
        } else {
            $teamList = DB::table('team')
                ->where('especialidad', $especialidad)
                ->where('year', $year)
                ->orderBy('olimpico', 'desc')
                ->get();
        }

        return $teamList;
    }

    /**
     * @param int $especialidad
     * @param int $year
     * @return array
     */
    public function getByEspecialityAngYear($especialidad, $year){
        $teamMapper = new TeamMapper();
        $teamList = [];
        $teamList = DB::table('team')
            ->where('especialidad', $especialidad)
            ->where('current_season', $year)
            ->orderBy('olimpico', 'desc')
            ->get();
        $teamList = $teamMapper->mapCollection($teamList);
        return $teamList;
    }
    
    /**
     * @param Request $request
     * @return int
     */
    public function postTeamNew(Request $request, $img){
        $teamMapper = new TeamMapper();
        $data = $request->all();
        $team = $teamMapper->map($data);
        $id = DB::table('team')
            ->insertGetId(
                [
                    'name' => $team->getName(),
                    'alias' => $team->getAlias(),
                    'description' => $team->getDescription(),
                    'image' => $img,
                    'current_season' => $team->getCurrentSeason(),
                    'pos' => $team->getPos(),
                    'olimpico' => $team->getOlimpico(),
                    'especialidad' => $team->getEspecialidad(),
                    'twitter' => $team->getTwitter(),
                    'twich' => $team->getTwich(),
                    'instagram' => $team->getInstagram(),
                    'youtube' => $team->getYoutube(),
                    'tiktok' => $team->getTiktok(),
                    'categoria' => $team->getCategoria(),
                ]
            );
        return $id;
    }

    /**
     * @param Request $request
     * @return int
     */
    public function postTeamEdit(Request $request, $img){
        $teamMapper = new TeamMapper();
        $data = $request->all();
        $team = $teamMapper->map($data);
        $id = DB::table('team')
            ->where('id', $team->getId())
            ->update(
                [
                    'name' => $team->getName(),
                    'alias' => $team->getAlias(),
                    'description' => $team->getDescription(),
                    'image' => $img,
                    'current_season' => $team->getCurrentSeason(),
                    'pos' => $team->getPos(),
                    'olimpico' => $team->getOlimpico(),
                    'especialidad' => $team->getEspecialidad(),
                    'twitter' => $team->getTwitter(),
                    'twich' => $team->getTwich(),
                    'instagram' => $team->getInstagram(),
                    'youtube' => $team->getYoutube(),
                    'tiktok' => $team->getTiktok(),
                    'categoria' => $team->getCategoria(),
                ]
            );
        return $id;
    }

    /**
     * @param int $id
     * @return int
     */
    public function postTeamDelete($id){
        $id = DB::table('team')
            ->where('id', $id)
            ->delete();
        return $id;
    }
}