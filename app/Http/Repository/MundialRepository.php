<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MundialRepository
{

    public function getAll(){
        $mundial = DB::table('mundial')->get();
        $return = [];
        foreach($mundial as $_mundial){
            $return[$_mundial->section][$_mundial->key][] = $_mundial;
        }
        return $return;
    }

    public function update($id,$value){
        DB::table('mundial')
        ->where('id', $id)
        ->update(['content' => $value]);
    }

    public function getConfigMundial(){
        $mundial = DB::table('mundial')->get();
        $return = [];
        foreach($mundial as $_mundial){
            if($_mundial->section == 'mundial' || $_mundial->section == 'valencia'){
                $return[$_mundial->section][$_mundial->subsection][$_mundial->key][] = $_mundial;
            }else{
                $return[$_mundial->section][$_mundial->key][] = $_mundial;
            }
        }
        return $return;
    }

}