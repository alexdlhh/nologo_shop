<?php
namespace App\Http\Entity;

class TeamEntity{
    public $id;
    public $name;
    public $alias;
    public $image;
    public $current_season;
    public $pos;
    public $description;
    public $olimpico;
    public $especialidad;
    public $twitter;
    public $instagram;
    public $tiktok;
    public $youtube;
    public $twich;
    public $categoria

    public function __construct($id=0, $name="", $alias="", $image="", $current_season=0, $pos=0, $description="", $olimpico=0, $especialidad=0, $twitter="", $instagram="", $youtube="", $tiktok="", $twich="", $categoria=0){
        $this->id = $id;
        $this->name = $name;
        $this->alias = $alias;
        $this->image = $image;
        $this->current_season = $current_season;
        $this->pos = $pos;
        $this->description = $description;
        $this->olimpico = $olimpico;
        $this->especialidad = $especialidad;
        $this->twitter = $twitter;
        $this->instagram = $instagram;
        $this->yotube = $youtube;
        $this->tiktok = $tiktok;
        $this->twich = $twich;
        $this->categoria = $categoria;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getAlias(){
        return $this->alias;
    }

    public function getImage(){
        return $this->image;
    }

    public function getCurrentSeason(){
        return $this->current_season;
    }

    public function getPos(){
        return $this->pos;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getOlimpico(){
        return $this->olimpico;
    }

    public function getEspecialidad(){
        return $this->especialidad;
    }

    public function getTwitter(){
        return $this->twitter;
    }

    public function getInstagram(){
        return $this->instagram;
    }

    public function getYoutube(){
        return $this->youtube;
    }

    public function getTiktok(){
        return $this->tiktok;
    }

    public function getTwich(){
        return $this->twich;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setAlias($alias){
        $this->alias = $alias;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function setCurrentSeason($current_season){
        $this->current_season = $current_season;
    }

    public function setPos($pos){
        $this->pos = $pos;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setOlimpico($olimpico){
        $this->olimpico = $olimpico;
    }

    public function setEspecialidad($especialidad){
        $this->especialidad = $especialidad;
    }

    public function setTwitter($twitter){
        $this->twitter = $twitter;
    }

    public function setInstagram($instagram){
        $this->instagram = $instagram;
    }

    public function setYoutube($youtube){
        $this->youtube = $youtube;
    }

    public function setTiktok($tiktok){
        $this->tiktok = $tiktok;
    }

    public function setTwich($twich){
        $this->twich = $twich;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'alias' => $this->alias,
            'image' => $this->image,
            'current_season' => $this->current_season,
            'pos' => $this->pos,
            'description' => $this->description,
            'olimpico' => $this->olimpico,
            'especialidad' => $this->especialidad,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'tiktok' => $this->tiktok,
            'twich' => $this->twich,
            'categoria' => $this->categoria
        ];
    }

}