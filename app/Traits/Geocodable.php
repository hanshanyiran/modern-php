<?php

namespace App\Traits;


trait Geocodable
{
    protected $address;

    protected $longitude;

    protected $latitude;

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return empty($this->address) ? 'longitude:'.$this->longitude. ',latitude:'.$this->latitude : $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }




}