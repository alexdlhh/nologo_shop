<?php

namespace App\Http\Entities;

class PagesEntity{
    public $id;
    public $title;
    public $url;
    public $section;
    public $order;
    public $id_dad;

    public function __construct($id, $title, $url, $section, $order, $id_dad)
    {
        $this->id = $id;
        $this->title = $title;
        $this->url = $url;
        $this->section = $section;
        $this->order = $order;
        $this->id_dad = $id_dad;
    }

    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string $section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @return string $order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return string $id_dad
     */
    public function getIdDad()
    {
        return $this->id_dad;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param string $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    /**
     * @param string $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @param string $id_dad
     */
    public function setIdDad($id_dad)
    {
        $this->id_dad = $id_dad;
    }

}