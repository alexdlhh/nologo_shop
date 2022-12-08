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

}