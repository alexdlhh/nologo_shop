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
        $sponsor = $sponsorMapper->map(get_object_vars($sponsor));
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
                'updated_at' => date('Y-m-d H:i:s'),
                'subtitle' => $sponsor->getSubtitle(),
                'type' => $sponsor->getType()
            ]);
        return $id;
    }
    
    /**
     * @param array $data
     * 
     * @return bool
     */
    public function update(Request $request,int $id, string $image, string $image_white){
        $sponsorMapper = new SponsorMapper();
        $sponsor = $sponsorMapper->map($request->all());
        //si $image o $image_white estan vacios, no se actualizan
        if($image != '' && $image != 'undefined'){
            DB::table('sponsor')
            ->where('id', $id)
            ->update([
                'image' => $image
            ]);
        }
        if($image_white != '' && $image_white != 'undefined'){
            DB::table('sponsor')
            ->where('id', $id)
            ->update([
                'white' => $image_white,
            ]);
        }
        $updated = DB::table('sponsor')
            ->where('id', $id)
            ->update([
                'name' => $sponsor->getName(),
                'description' => $sponsor->getDescription(),
                'url' => $sponsor->getUrl(),
                'updated_at' => date('Y-m-d H:i:s'),
                'subtitle' => $sponsor->getSubtitle(),
                'type' => $sponsor->getType()
            ]);
        return $sponsor->getId();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function delete($id){
        $sponsorMapper = new SponsorMapper();
        $deleted = DB::table('sponsor')
            ->where('id', $id)
            ->delete();
        return true;
    }

    /**
     * buscamos en todas las columnas de sponsor
     */
    public function search($search){
        $sponsorMapper = new SponsorMapper();
        $sponsors = DB::table('sponsor')
            ->where('name', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->orWhere('url', 'like', '%'.$search.'%')
            ->orWhere('subtitle', 'like', '%'.$search.'%')
            ->get();
        $sponsorList = $sponsorMapper->mapCollection($sponsors);
        return $sponsorList;
    }
}