<?php

namespace App\Http\Entity;

class EmployeeEntity{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $charge;
    public $twitter;
    public $featuredImage;

    public function __construct($id, $name, $email, $phone, $charge, $twitter, $featuredImage)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->charge = $charge;
        $this->twitter = $twitter;
        $this->featuredImage = $featuredImage;
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
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string $charge
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * @return string $twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @return string $featuredImage
     */
    public function getFeaturedImage()
    {
        return $this->featuredImage;
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
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param string $charge
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @param string $featuredImage
     */
    public function setFeaturedImage($featuredImage)
    {
        $this->featuredImage = $featuredImage;
    }

}