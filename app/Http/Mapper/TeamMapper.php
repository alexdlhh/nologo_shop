<?php
namespace App\Http\Mapper;

use App\Http\Entity\TeamEntity;

class TeamMapper{
    /**
     * @param array $data
     * @return TeamEntity
     */
    public function map(array $data): TeamEntity{
        $team = new TeamEntity();
        !empty($data['id']) ? $team->setId($data['id']) : null;
        !empty($data['name']) ? $team->setName($data['name']) : null;
        !empty($data['alias']) ? $team->setAlias($data['alias']) : null;
        !empty($data['image']) ? $team->setImage($data['image']) : null;
        !empty($data['current_season']) ? $team->setCurrentSeason($data['current_season']) : null;
        !empty($data['pos']) ? $team->setPos($data['pos']) : null;
        !empty($data['description']) ? $team->setDescription($data['description']) : null;
        !empty($data['olimpico']) ? $team->setOlimpico($data['olimpico']) : null;

        return $team;
    }

    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection($data): array{
        $teams = [];
        foreach ($data as $item) {
            if(is_array($item)) {
                $teams[] = $this->map($item);
            }else{
                $teams[] = $this->map(get_object_vars($item));
            }
        }
        return $teams;
    }
}