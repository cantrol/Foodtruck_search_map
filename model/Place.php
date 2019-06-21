<?php

class Place
{
    private $id;
    private $name;
    private $address;
    private $lat;
    private $lng;
    private $webpage;
    private $email;
    private $type = "foodtruck";
    private $datetime_added;
    private $added_by_user;

    public function __construct($name, $address, $lat, $lng, $email, $webpage)
    {
        $this->name = $name;
        $this->address = $address;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->email = $email;
        $this->webpage = $webpage;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat): void
    {
        $this->lat = $lat;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng): void
    {
        $this->lng = $lng;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDatetimeAdded()
    {
        return $this->datetime_added;
    }

    public function getAddedByUser()
    {
        return $this->added_by_user;
    }

    public function getWebpage()
    {
        return $this->webpage;
    }

    public function setWebpage($webpage): void
    {
        $this->webpage = $webpage;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setAddedByUser($added_by_user): void
    {
        $this->added_by_user = $added_by_user;
    }


}