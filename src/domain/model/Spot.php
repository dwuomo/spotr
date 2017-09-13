<?php

namespace embryon\domain\model;

/**
 * Class Spot
 */
class Spot
{
    /** @var  string */
    private $_id;
    /** @var  Location */
    private $_location;
    /** @var  String */
    private $_name;
    /** @var  array */
    private $_sports;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->_location;
    }

    /**
     * @param Location $location
     */
    public function setLocation($location)
    {
        $this->_location = $location;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param String $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return array
     */
    public function getSports()
    {
        return $this->_sports;
    }

    /**
     * @param array $sports
     */
    public function setSports($sports)
    {
        $this->_sports = $sports;
    }

}