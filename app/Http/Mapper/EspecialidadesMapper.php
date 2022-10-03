<?php
namespace App\Http\Mapper;

use App\Http\Entity\EspecialidadesEntity;

class EspecialidadesMapper
{
    /**
     * @param array $data
     * @return EspecialidadesEntity
     */
    public function map(array $data): EspecialidadesEntity
    {
        $especialidades = new EspecialidadesEntity();
        !empty($data['id']) ? $especialidades->setId($data['id']) : null;
        !empty($data['name']) ? $especialidades->setName($data['name']) : null;
        !empty($data['alias']) ? $especialidades->setAlias($data['alias']) : null;
        !empty($data['icon']) ? $especialidades->setIcon($data['icon']) : null;
        !empty($data['current_season']) ? $especialidades->setCurrentSeason($data['current_season']) : null;
        !empty($data['pos']) ? $especialidades->setPos($data['pos']) : null;
        !empty($data['description']) ? $especialidades->setDescription($data['description']) : null;
        !empty($data['olimpico']) ? $especialidades->setOlimpico($data['olimpico']) : null;

        return $especialidades;
    }
    
    /**
     * @param Array $data
     * @return array
     */
    public function mapCollection($data): array
    {
        $especialidades = [];
        foreach ($data as $item) {
            if(is_array($item)) {
                $especialidades[] = $this->map($item);
            }else{
                $especialidades[] = $this->map(get_object_vars($item));
            }
        }
        return $especialidades;
    }
}