<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GeneralRepository
{

    public function getAll(){
        $generals = DB::table('general')->get();
        $return = [];
        foreach($generals as $general){
            $return[$general->meta_key] = $general->meta_value;
        }
        return $return;
    }

    public function update($data,$image){
        foreach($data as $key => $value){
            if($key == 'image'){                
                if(!empty($image)){
                    $value = $image;
                    DB::table('general')
                    ->where('meta_key', $key)
                    ->update(['meta_value' => $value]);
                }else{
                    continue;
                }
            }else{
                DB::table('general')
                ->where('meta_key', $key)
                ->update(['meta_value' => $value]);
            }
            
        }
    }

    public function getConfigGeneral(){
        $general = DB::table('general')->where(['admin' => 1])->get();
        $return = [];
        foreach($general as $gen){
            $return[$gen->meta_key] = $gen->meta_value;
        }
        return $return;
    }

    public function search($search){
        $general = DB::table('general')
        ->where('meta_key','like','%'.$search.'%')
        ->orWhere('meta_value','like','%'.$search.'%')
        ->orWhere('title','like','%'.$search.'%')
        ->get();
        $return = [];
        foreach($general as $gen){
            $return[$gen->meta_key] = $gen->meta_value;
        }
        return $return;
    }

}