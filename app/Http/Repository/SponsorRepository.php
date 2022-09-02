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
    public function getAll()
    {
        $sponsorMapper = new SponsorMapper();
    
        $sponsors = DB::table('sponsor')
                ->get();
        
        $sponsorList = $sponsorMapper->mapCollection($sponsors);
        return $sponsorList;
    }
    
    /**
     * @param array $filter
     * @return SponsorEntity
     */
    public function getOne($id){
        $sponsorMapper = new SponsorMapper();
        $sponsor = DB::table('sponsor')
            ->where('id', $id)
            ->first();
        $sponsor = $sponsorMapper->map($sponsor);
        return $sponsor;
    }
    
    /**
     * @param array $data
     * @return int $id
     */
    public function create(Request $request, string $image, string $image_white){
        $sponsorMapper = new SponsorMapper();
        $sponsor = $sponsorMapper->map($request->all());
        $id = DB::table('sponsor')
            ->insertGetId([
                'name' => $sponsor->getName(),
                'description' => $sponsor->getDescription(),
                'image' => $image,
                'white' => $image_white,
                'url' => $sponsor->getUrl(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        return $id;
    }
    
    /**
     * @param array $data
     * 
     * @return bool
     */
    public function update(Request $request,int $id, string $image){
        $sponsorMapper = new SponsorMapper();
        $sponsor = $sponsorMapper->map($request->all());
        $id = DB::table('sponsor')
            ->where('id', $id)
            ->update([
                'name' => $sponsor->getName(),
                'description' => $sponsor->getDescription(),
                'image' => $image,
                'white' => $image_white,
                'url' => $sponsor->getUrl(),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        return $id;
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