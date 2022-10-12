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
}