<?php
namespace App\Http\Mapper;

use App\Http\Entity\BannerEntity;

class BannerMapper
{
    public function map($data)
    {
        $banner = new BannerEntity();
        !empty($data['id'])?$banner->setId($data['id']):'';
        !empty($data['url'])?$banner->setUrl($data['url']):'';
        !empty($data['img'])?$banner->setImg($data['img']):'';
        !empty($data['active'])?$banner->setActive($data['active']):0;
        !empty($data['place'])?$banner->setPlace($data['place']):'';
        return $banner;
    }

    public function mapCollection($data)
    {
        $bannerList = [];
        foreach ($data as $item) {
            if(is_array($item)){
                $bannerList[] = $this->map($item);
            }else{
                $bannerList[] = $this->map(get_object_vars($item));
            }
        }
        return $bannerList;
    }
}