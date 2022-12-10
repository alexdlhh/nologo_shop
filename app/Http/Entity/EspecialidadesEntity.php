<?php
namespace App\Http\Entity;

class EspecialidadesEntity{
    public $id;
    public $name;
    public $alias;
    public $icon;
    public $current_season;
    public $pos;
    public $description;
    public $olimpico;
    public $acronimo;

    public function __construct($id = 0, $name = '', $alias = '', $icon = '', $current_season = '', $pos = '', $description = '', $olimpico = '', $acronimo = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->alias = $alias;
        $this->icon = $icon;
        $this->current_season = $current_season;
        $this->pos = $pos;
        $this->description = $description;
        $this->olimpico = $olimpico;
        $this->acronimo = $acronimo;
    }

    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string $alias
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @return string $icon
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return string $current_season
     */
    public function getCurrentSeason()
    {
        return $this->current_season;
    }

    /**
     * @return string $pos
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int $olimpico
     */
    public function getOlimpico()
    {
        return $this->olimpico;
    }

    /**
     * @return string $acronimo
     */
    public function getAcronimo()
    {
        return $this->acronimo;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @param string $current_season
     */
    public function setCurrentSeason($current_season)
    {
        $this->current_season = $current_season;
    }

    /**
     * @param string $pos
     */
    public function setPos($pos)
    {
        $this->pos = $pos;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param int $olimpico
     */
    public function setOlimpico($olimpico)
    {
        $this->olimpico = $olimpico;
    }

    /**
     * @param string $acronimo
     */
    public function setAcronimo($acronimo)
    {
        $this->acronimo = $acronimo;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'alias' => $this->alias,
            'icon' => $this->icon,
            'current_season' => $this->current_season,
            'pos' => $this->pos,
            'description' => $this->description,
            'olimpico' => $this->olimpico,
            'acronimo' => $this->acronimo
        ];
    }
}