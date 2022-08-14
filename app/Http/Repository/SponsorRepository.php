<?php

namespace App\Http\Repository;

use App\Http\Entity\SponsorEntity;
use App\Http\Mapper\SponsorMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SponsorRepository
{

    /**
     * @param array $data
     * @return array
     */
    public function getAll($filter = [])
    {
        $sponsorMapper = new SponsorMapper();
    
        if(!empty($filter)) {
            $sponsors = DB::table('sponsor')
                ->where($filter)
                ->get();
        } else {
            $sponsors = DB::table('sponsor')
                ->get();
        }
        
        $sponsorList = $sponsorMapper->mapCollection($sponsors);
        return $sponsorList;
    }
    
    /**
     * @param array $filter
     * @return SponsorEntity
     */
    public function getOne($filter = []){
        $sponsorMapper = new SponsorMapper();
        $sponsor = DB::table('sponsor')
            ->where($filter)
            ->first();
        $sponsor = $sponsorMapper->map($sponsor);
        return $sponsor;
    }
    
    /**
     * @param array $data
     * @return bool
     */
    public function create(Request $request){
        $sponsorMapper = new SponsorMapper();
        $sponsor = $sponsorMapper->map($request->all());
        $sponsor->save();
        return true;
    }
    
    /**
     * @param array $data
     * 
     * @return bool
     */
    public function update(Request $request, $filter = []){
        $sponsorMapper = new SponsorMapper();
        $sponsor = $sponsorMapper->map($request->all());
        $sponsor->save();
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function delete($filter = []){
        $sponsorMapper = new SponsorMapper();
        $sponsor = $sponsorMapper->map($filter);
        $sponsor->delete();
        return true;
    }
}