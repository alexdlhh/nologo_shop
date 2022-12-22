<?php

namespace App\Http\Repository;

use App\Http\Entity\BannerEntity;
use App\Http\Mapper\BannerMapper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BannerRepository
{
    /**
     * @param string $place
     * @param int $active
     * @return array
     */
    public function getAll($place = ''){
        $bannerMapper = new BannerMapper();
        $bannerList = [];
        if(!empty($place)) {
            $banner = DB::table('banner')
                ->where('place', $place)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $banner = DB::table('banner')
                ->orderBy('id', 'desc')
                ->get();
        }
        if(!empty($banner->toArray())) {
            $bannerList = $bannerMapper->mapCollection($banner->toArray());
        }
        return $bannerList;
    }
    
    /**
     * @param array $filter
     * @return BannerEntity
     */
    public function getOne($place){
        $bannerMapper = new BannerMapper();
        $banner = DB::table('banner')
            ->where('place', $place)
            ->first();
        $banner = $bannerMapper->map(get_object_vars($banner));
        return $banner;
    }

    /**
     * getById
     * @param int $id
     * @return array
     */
    public function getById(int $id){
        $bannerMapper = new BannerMapper();
        $banner = DB::table('banner')
            ->where('id', $id)
            ->first();
        $banner = $bannerMapper->map(get_object_vars($banner));
        return $banner;
    }

    /**
     * @param array $data
     * @return int
     */
    public function create(Request $request,$img)
    {
        $data = [
            'place' => $request->input('place'),
            'url' => $request->input('url'),
            'active' => $request->input('active'),
        ];
        if(!empty($img)){
            $data['img'] = $img;
        }
        $id = DB::table('banner')->insertGetId($data);
        return $id;
    }

    /**
     * @param array $data
     * @return int
     */
    public function update($id,Request $request,$img)
    {
        $data = $request->all();
        if(!empty($img)){
            $banner = DB::table('banner')
            ->where('id', $id)
            ->update([
                'place' => $data['place'],
                'url' => $data['url'],
                'img' => $img,
                'active' => $data['active']
            ]);
        } else {
            $banner = DB::table('banner')
                ->where('id', $id)
                ->update([
                    'place' => $data['place'],
                    'url' => $data['url'],
                    'active' => $data['active']
                ]);
        }

        return $banner;
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete($id)
    {
        $banner = DB::table('banner')
            ->where('id', $id)
            ->delete();
        return $banner;
    }

    /**
     * Esta funcion actualiza el estado del banner en bbdd
     * @param $id
     * @param $active
     * @return int
     */
    public function status($id, $active){
        $banner = DB::table('banner')
            ->where('id', $id)
            ->update(['active' => $active]);
        return $banner;
    }

    /**
     * Buscamos en todos los campos de al banner
     * @param $search
     * @return array
     */
    public function search($search){
        $bannerMapper = new BannerMapper();
        $banner = DB::table('banner')
            ->where('place', 'like', '%'.$search.'%')
            ->orWhere('url', 'like', '%'.$search.'%')            
            ->get();
        $banner = $bannerMapper->mapCollection($banner->toArray());
        return $banner;
    }

    /**
     * Buscamos en todos los campos de al banner
     * @param $search
     * @return array
     */
    public function basicsearch($search){
        $bannerMapper = new BannerMapper();
        $banner = DB::table('banner')
            ->where('active',1)
            ->where('place', 'like', '%'.$search.'%')
            ->orWhere('url', 'like', '%'.$search.'%')            
            ->get();
        $banner = $bannerMapper->mapCollection($banner->toArray());
        return $banner;
    }
}